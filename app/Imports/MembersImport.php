<?php

namespace App\Imports;

use App\Http\Controllers\MembreController;
use App\Jobs\SendMemberWelcomeEmail;
use App\Models\Membre;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class MembersImport implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsEmptyRows,
    WithChunkReading
{
    private $groupeId;
    private $errors = [];
    private $rowNumber = 0;

    public function __construct($groupeId)
    {
        $this->groupeId = $groupeId;
    }

    /**
     * Définir les règles de validation pour chaque ligne
     */
    public function rules(): array
    {
        return [
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
        ];
    }

    /**
     * Messages d'erreur personnalisés pour les validations
     */
    public function customValidationMessages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.max' => 'Le prénom ne peut pas dépasser 255 caractères.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse valide.',
            'email.max' => 'L\'email ne peut pas dépasser 255 caractères.',
            'email.unique' => 'Cet email est déjà utilisé.',
        ];
    }

    /**
     * @param array $row
     *
     * @return Membre|null
     */
    public function model(array $row): ?Membre
    {
        $this->rowNumber++;

        try {
            // Vérifier si la ligne est vide
            if ($this->isEmptyRow($row)) {
                return null;
            }

            // Nettoyer les données
            $cleanedData = $this->cleanRowData($row);

            // Vérifier si les champs requis sont présents et non vides
            if (!$this->hasRequiredFields($cleanedData)) {
                $this->addError("Ligne {$this->rowNumber} : Certains champs obligatoires (prenom, nom ou email) sont manquants ou vides.");
                return null;
            }

            // Vérifier la validité de l'email
            if (!filter_var($cleanedData['email'], FILTER_VALIDATE_EMAIL)) {
                $this->addError("Ligne {$this->rowNumber} : L'adresse email '{$cleanedData['email']}' n'est pas valide.");
                return null;
            }

            // Vérifier si l'email existe déjà
            if (Membre::where('email', strtolower($cleanedData['email']))->exists()) {
                $this->addError("Ligne {$this->rowNumber} : L'adresse email '{$cleanedData['email']}' est déjà utilisée.");
                return null;
            }

            $pwd = Str::random(10);

            $membre = Membre::create([
                'nom' => $this->sanitizeString($cleanedData['nom']),
                'prenom' => $this->sanitizeString($cleanedData['prenom']),
                'email' => strtolower($cleanedData['email']),
                'groupe_id' => $this->groupeId,
                'username' => MembreController::generateUsername(),
                'password' => Hash::make($pwd),
            ]);
            // Mettre en file d'attente l'envoi de l'email de bienvenue
            Queue::push(new SendMemberWelcomeEmail($membre, $pwd));

            return $membre;

        } catch (Exception $e) {
            Log::error("Erreur lors de l'importation à la ligne {$this->rowNumber} : " . $e->getMessage());
            $this->addError("Ligne {$this->rowNumber} : " . $e->getMessage());
            return null;
        }
    }

    /**
     * Vérifier si une ligne est vide
     */
    private function isEmptyRow(array $row): bool
    {
        return empty(array_filter($row, function($value) {
            return $value !== null && $value !== '';
        }));
    }

    /**
     * Nettoyer les données d'une ligne
     */
    private function cleanRowData(array $row): array
    {
        return array_map(function($value) {
            if (is_string($value)) {
                // Supprime les espaces avant et après
                $value = trim($value);
                // Normaliser les espaces multiples en un seul espace
                $value = preg_replace('/\s+/', ' ', $value);
                // Nettoyer les caractères invisibles ou non imprimables
                $value = preg_replace('/[\x00-\x1F\x7F]/u', '', $value);
            }
            return $value;
        }, $row);
    }

    /**
     * Vérifier si tous les champs requis sont présents
     */
    private function hasRequiredFields(array $data): bool
    {
        return !empty($data['prenom']) && !empty($data['nom']) && !empty($data['email']);
    }

    /**
     * Nettoyer une chaîne de caractères
     */
    private function sanitizeString(string $value): string
    {
        // Convertir les caractères spéciaux HTML en entités (évite les injections XSS)
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

        // Limiter la longueur
        if (strlen($value) > 255) {
            $value = substr($value, 0, 252) . '...';
        }

        return $value;
    }

    /**
     * Gérer les erreurs lors de l'importation
     */
    public function onError(Throwable $e)
    {
        $this->addError("Erreur générale : " . $e->getMessage());
    }

    /**
     * Ajouter une erreur à la liste
     */
    private function addError(string $message): void
    {
        $this->errors[] = $message;
    }

    /**
     * Récupérer les erreurs après l'import
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Définir la taille des lots pour l'insertion
     */
    public function batchSize(): int
    {
        return 100;
    }

    /**
     * Définir la taille des chunks pour la lecture
     */
    public function chunkSize(): int
    {
        return 100;
    }
}
