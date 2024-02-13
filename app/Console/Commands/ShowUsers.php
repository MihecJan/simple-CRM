<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ShowUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:show {--short : Don\'t show all columns}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all users information';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $headers = null;
        $users = User::all();
        $table_rows = [];

        if ($this->option('short')) {
            $headers = ['id', 'name', 'email', 'email_verified_at'];

            foreach ($users as $user) {
                $table_rows[] = [$user->id, $user->name, $user->email, $user->email_verified_at];
            }
        }
        else {
            $headers = ['id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

            foreach ($users as $user) {
                $table_rows[] = [$user->id, $user->name, $user->email, $user->email_verified_at, $user->password, $user->remember_token, $user->created_at, $user->updated_at];
            }
        }
    
        $this->table($headers, $table_rows);
    
        return 0;
    }
}
