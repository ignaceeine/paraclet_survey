<?php

namespace App\Jobs;

use App\Mail\MemberWelcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendMemberWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // Stockez les données individuelles plutôt que l'objet entier
    protected $memberId;
    protected $memberUsername;
    protected $memberEmail;
    protected $memberPrenom;
    protected $memberNom;
    protected $password;

    /**
     * Create a new job instance.
     */
    public function __construct($member, $password)
    {
        // Stocker uniquement les informations nécessaires
        $this->memberId = $member->id;
        $this->memberUsername = $member->username;
        $this->memberEmail = $member->email;
        $this->memberPrenom = $member->prenom;
        $this->memberNom = $member->nom;
        $this->password = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Créer un objet temporaire pour le mailable
            $memberData = (object)[
                'id' => $this->memberId,
                'username' => $this->memberUsername,
                'email' => $this->memberEmail,
                'prenom' => $this->memberPrenom,
                'nom' => $this->memberNom
            ];

            Mail::to($this->memberEmail)->send(new MemberWelcome($memberData, $this->password));

            Log::info('Mail envoyé à ' . $this->memberEmail, [
                'member_id' => $this->memberId
            ]);
        }
        catch (Throwable $e) {
            Log::error('Erreur lors de l\'envoi de l\'email de bienvenue', [
                'member_id' => $this->memberId,
                'email' => $this->memberEmail,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Relancer l'exception pour que Laravel puisse gérer les tentatives
            throw $e;
        }
    }

    /**
     * Gestion en cas d'échec définitif
     */
    public function failed(Throwable $e)
    {
        Log::error('Échec définitif de l\'envoi de l\'email de bienvenue', [
            'member_id' => $this->memberId,
            'email' => $this->memberEmail,
            'error' => $e->getMessage()
        ]);
    }
}
