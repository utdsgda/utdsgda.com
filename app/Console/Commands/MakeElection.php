<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Election;
use App\ElectionPollOption;

class MakeElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:election';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new election in the database';

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
        $electionName = $this->ask('Election Name');

        $hasSlugInput = true;

        while ($hasSlugInput) {
            $electionSlug = $this->ask('URL Slug for Election (Not including slashes)');

            if (Election::where('slug', $electionSlug)->count() > 0) {
                $this->error('Election with that URL slug already exists!');
            } else {
                $hasSlugInput = false;
                break;
            }
        }

        $electionStartDate = new \DateTime($this->ask('Election Start Date (Format: April 9 2018 12:30)'));
        $electionEndDate = new \DateTime($this->ask('Election End Date (Format: April 9 2018 12:30)'));

        $election = new Election;
        $election->name = $electionName;
        $election->slug = $electionSlug;

        $election->start_date = $electionStartDate;
        $election->end_date = $electionEndDate;

        $election->save();

        $hasPollOption = true;

        while ($hasPollOption) {
            $pollOptionText = $this->ask('Enter Poll Option (or blank if no more options to enter)');

            if (trim($pollOptionText) === '') {
                $hasPollOption = false;
                break;
            } else {
                $pollOption = new ElectionPollOption;
                $pollOption->text = $pollOptionText;

                $pollOption->election()->associate($election);

                $pollOption->save();
            }
        }
    }
}
