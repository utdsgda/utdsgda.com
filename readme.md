# UTD SGDA Website

This is the Laravel-based web app that powers the SGDA website.

Please pardon the mess as we upgrade our codebase.

## Viewing Election Results

Visit [utdsgda.com/election-results](https://utdsgda.com/election-results)

## Artisan Console Commands

Navigate to the app root (on live, this is /var/www/utdsgda.com/current)

All commands are in the format `php artisan <command> [<args/options>]`

### Members

`add:members [--file=data.csv]`

Interactively add members, or optionally specify a file (it's currently hard coded to accept the output from exporting the Spring 2018 voting registration data). If using the file method, you can upload it using `scp <local path to CSV> username@utdsgda.com:/var/www/utdsgda.com/current`. Please don't forget to remove the CSV file after running the command!

`delete:member`

Interactively delete a member, leaving their old data intact. Currently there is no option to automatically clear related data, but it's planned as a future feature

### Elections

`make:election`

Interactively create an election in the database, along with the poll options (candidates, etc.)

`delete:election`

Interactively delete an election

`make:polloption`

Interactively add a poll option to an election

`delete:polloption`

Interactively delete a specific poll option from an election

### Vote Codes

`send:votecodes`

Interactively select an election to send vote codes for. Codes are automatically generated that are specific to each member and also that the specified election
