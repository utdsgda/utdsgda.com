<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VoteCode extends Mailable
{
    use Queueable, SerializesModels;

    public $election;
    public $voteCode;
    public $member;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Election $election, \App\VoteCode $voteCode, \App\Member $member)
    {
        $this->election = $election;
        $this->voteCode = $voteCode;
        $this->member = $member;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Vote Code for the SGDA Election')->view('emails.vote-code');
    }
}
