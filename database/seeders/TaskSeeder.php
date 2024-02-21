<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only import seeds if DB is empty.
        if (Task::count() !== 0) {
            return;
        }

        Task::factory(2)->create();
    }
}
