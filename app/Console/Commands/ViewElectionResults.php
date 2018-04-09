<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Election;

class ViewElectionResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:election';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View election results';

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

        $pollOptions = $election->pollOptions()->withCount('votes')->orderBy('votes_count', 'desc')->get();
        $pollResults = [];

        foreach($pollOptions as $pollOption) {
            $pollResults[] = [
                'votes' => $pollOption->votes->count(),
                'text' => $pollOption->text
            ];
        }

        $this->table(['Votes', 'Option'], $pollResults);
    }
}
