<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes user by their id.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user_id = $this->argument('user_id');
	    $user = User::find($user_id);

	    /* When the find method doesn't find a database record with that ID,
	    it will return null. */
        if ($user === null) {
            $this->error("Invalid or non-existent user ID.");
            return 1;
        }

        // Ask for final confirmation that all data is correct, using confirm helper
        $this->info('User to be deleted:');
        $this->info('Name: ' . $user->name);
        $this->info('Email: ' . $user->email);

        if ($this->confirm('Are you sure you want to delete this user?')) {
            $user->delete();

            $this->info('User deleted.');
            return 0;
        }

        $this->info('User NOT deleted.');
        return 0;
    }
}
