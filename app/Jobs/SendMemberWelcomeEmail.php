<?php

namespace App\Jobs;

use App\Mail\MemberWelcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMemberWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue ,Queueable, SerializesModels;
    protected $member;
    protected $password;
    /**
     * Create a new job instance.
     */
    public function __construct($member, $password)
    {
        $this->member = $member;
        $this->password = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->member->email)->send(new MemberWelcome($this->member, $this->password));
    }
}
