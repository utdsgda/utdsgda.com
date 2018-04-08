<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Member;
use App\Election;

class SendVoteCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:votecodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to all members with a vote code for a given election';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $allElections = Election::all();
        $electionStrings = [];

        foreach($allElections as $electionOption) {
            $electionStrings[] = $electionOption->name . ' - Election ID ' . $electionOption->id;
        }

        $selectedElectionString = $this->choice('Which election to generate codes for? (Use number on the left)', $electionStrings);
        $election = Election::where('name', substr($selectedElectionString, 0, strpos($selectedElectionString, ' - Election ID')))->first();

        //////////////// Generate (or resend if existing) vote codes ////////////////

        $allMembers = Member::all();

        foreach($allMembers as $member) {
            $alreadyHasVoteCode = false;
            $memberVoteCodes = $member->voteCodes;

            $voteCode = null;

            if ($memberVoteCodes) {
                foreach($memberVoteCodes as $memberVoteCode) {
                    if ($memberVoteCode->election && $memberVoteCode->election->id === $election->id) {
                        $alreadyHasVoteCode = true;
                        $voteCode = $memberVoteCode;
                        break;
                    }
                }
            }

            if (!$alreadyHasVoteCode) {
                $voteCodeText = str_random(42);

                $voteCode = new \App\VoteCode;
                $voteCode->text = $voteCodeText;

                $voteCode->election()->associate($election);
                $voteCode->member()->associate($member);

                $voteCode->save();
            }

            //////////////// Mail vote codes ////////////////

            Mail::to($member->email)->send(new \App\Mail\VoteCode($election, $voteCode, $member));
        }
    }
}
