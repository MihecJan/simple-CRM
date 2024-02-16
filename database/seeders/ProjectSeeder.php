<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only import seeds if DB is empty.
        if (Project::count() !== 0) {
            return;
        }

        Project::factory(6)->create();
    }
}
