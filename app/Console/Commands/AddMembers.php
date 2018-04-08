<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Member;

class AddMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:members {--file=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds members to the database';

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
        $fileName = $this->option('file');

        if ($fileName) {
            $handle = fopen($fileName, 'r');
            $header = true;

            while ($line = fgetcsv($handle)) {
                if ($header) {
                    $header = false;
                } else {
                    $name = trim($line[2]);
                    $email = trim($line[3]);

                    // Assume netID if no domain

                    if (strpos($email, '@') === false) {
                        $email = $email . '@utdallas.edu';
                    }

                    $this->createMember($name, $email);
                }
            }

            fclose($handle);
        } else {
            $hasMemberToEnter = true;

            while ($hasMemberToEnter) {
                $name = $this->ask('Enter new member name (or blank to exit)');

                if (trim($name) === '') {
                    $hasMemberToEnter = false;
                    break;
                } else {
                    $email = $this->ask('Enter new member email address');

                    while(strpos($email, '@') === false) {
                        $this->error('Invalid email address - did you forget to add @utdallas.edu?');

                        $email = $this->ask('Enter new member email address');
                    }

                    $this->createMember($name, $email);
                    $this->info('Member created!');
                }
            }
        }
    }

    private function createMember($name, $email) {
        $member = new Member;

        $member->name = $name;
        $member->email = $email;

        $member->save();
    }
}
