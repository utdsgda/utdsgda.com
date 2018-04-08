<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Election;

class DeleteElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:election';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes an election from the database';

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

        $selectedElectionString = $this->choice('Which election should be deleted? (Use number on the left)', $electionStrings);
        $election = Election::where('name', substr($selectedElectionString, 0, strpos($selectedElectionString, ' - Election ID')))->first();

        $election->delete();
    }
}
