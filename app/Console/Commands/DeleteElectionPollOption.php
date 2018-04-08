<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Election;
use App\ElectionPollOption;

class DeleteElectionPollOption extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:polloption';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes a poll option from the database';

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

        $selectedElectionString = $this->choice('Which election? (Use number on the left)', $electionStrings);
        $election = Election::where('name', substr($selectedElectionString, 0, strpos($selectedElectionString, ' - Election ID')))->first();

        // List poll options

        $allPollOptions = $election->pollOptions;
        $pollOptionStrings = [];

        foreach($allPollOptions as $availablePollOption) {
            $pollOptionStrings[] = $availablePollOption->text . ' - Poll Option ID ' . $availablePollOption->id;
        }

        $selectedPollOptionString = $this->choice('Which poll option should be removed? (Use number on the left)', $pollOptionStrings);
        $pollOption = ElectionPollOption::where('text', substr($selectedPollOptionString, 0, strpos($selectedPollOptionString, ' - Poll Option ID')))->first();

        $pollOption->delete();
    }
}
