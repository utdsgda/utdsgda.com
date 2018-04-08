<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Member;

class DeleteMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:member';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes a member from the database';

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
        $allMembers = Member::all();
        $memberStrings = [];

        foreach($allMembers as $memberOption) {
            $memberStrings[] = $memberOption->name . ' - Member ID ' . $memberOption->id;
        }

        $selectedMemberString = $this->choice('Which election should be deleted? (Use number on the left)', $memberStrings);
        $member = Member::where('name', substr($selectedMemberString, 0, strpos($selectedMemberString, ' - Member ID')))->first();

        $member->delete();
    }
}
