<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Election;
use App\ElectionPollOption;

class MakeElectionPollOption extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:polloption';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a poll option the database';

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

        // Add the new poll option

        $pollOptionText = $this->ask('Enter Poll Option');

        $pollOption = new ElectionPollOption;
        $pollOption->text = $pollOptionText;

        $pollOption->election()->associate($election);

        $pollOption->save();
    }
}
