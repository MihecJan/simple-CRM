<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\{ Hash, Validator };

class RegisterUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:register-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a new user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Prompt for necessary information
        $name = $this->ask('Enter the user\'s name');
        $email = $this->ask('Enter the user\'s email');
        $password = $this->secret('Enter the user\'s password');
        $repeatPassword = $this->secret('Repeat the user\'s password');

        // Validate input
        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => 'required',
            'email' => 'required|email|unique:users,email', // Required and must be unique in the email column of theusers table
            'password' => 'required|same:password',         // Required and has to match the password field
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return 1;
        }

        // Ask for final confirmation that all data is correct, using confirm helper
	    $this->info('New user:');
	    $this->info('Name: ' . $name);
	    $this->info('Email: ' . $email);

	    if (!$this->confirm('Is this information correct?')) {
            $this->info("User NOT registered.");
            return 0;
	    }

        // Create the user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        // Output success message
        $this->info('User registered successfully!');
        return 0;
    }
}
