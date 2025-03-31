<?php

namespace App\Imports;

use App\Http\Controllers\MembreController;
use App\Jobs\SendMemberWelcomeEmail;
use App\Mail\MemberWelcome;
use App\Models\Membre;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class MembersImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    private $groupeId;
    private $errors = []; // Pour stocker les erreurs

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
            'email' => 'required|email|unique:users,email',
        ];
    }

    /**
     * Messages d'erreur personnalisés pour les validations
     */
    public function customValidationMessages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse valide.',
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
        try {
            // Vérifier si la ligne est vide ou ne contient que des valeurs nulles/vides
            if (empty(array_filter($row))) {
                return null; // Ignorer les lignes vides
            }

            // Nettoyer les données (supprimer espaces inutiles)
            $cleanedData = array_map(function($value) {
                return is_string($value) ? trim($value) : $value;
            }, $row);

            // Vérifier si les champs principaux sont vides après nettoyage
            if (empty($cleanedData['prenom']) || empty($cleanedData['nom']) || empty($cleanedData['email'])) {
                $this->errors[] = "Ligne " . (array_search($row, $this->allRows()) + 2) . ": Certains champs obligatoires (prenom, nom ou email) sont vides ou contiennent uniquement des espaces.";
                return null;
            }

            $pwd = Str::random(8);

            // Créer une nouvelle instance du modèle Membre
            $membre = new Membre([
                'nom' => $cleanedData['nom'],
                'prenom' => $cleanedData['prenom'],
                'email' => strtolower($cleanedData['email']), // Convertir l'email en minuscules
                'groupe_id' => $this->groupeId,
                'username' => MembreController::generateUsername(),
                'password' => Hash::make($pwd)
            ]);
            $membre->save();

            Queue::push(new SendMemberWelcomeEmail($membre,$pwd));

            return $membre;

        } catch (Exception $e) {
            $this->errors[] = "Erreur lors du traitement de la ligne " . (array_search($row, $this->allRows()) + 2) . ": " . $e->getMessage();
            return null;
        }
    }

    /**
     * Gérer les erreurs survenant pendant l'import
     */
    public function onError(Throwable $e)
    {
        // Cette méthode est appelée automatiquement si une erreur survient
        $this->errors[] = $e->getMessage();
    }

    /**
     * Récupérer toutes les lignes pour le suivi
     */
    private function allRows()
    {
        return $this->rows ?? [];
    }

    /**
     * Récupérer les erreurs après l'import
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
