<?php

namespace Database\Seeders;

use App\Models\User;
use App\Actions\ArrangePositions;
use App\Models\Project;
use App\Models\Proposal;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(200)->create();

        User::query()->inRandomOrder()->limit(10)->get()
            ->each(function (User $u) {
                $project = Project::factory()->create(['created_by' => $u->id]);
                Proposal::factory()->count(random_int(4, 45))->create(['project_id' => $project->id]);

                // Verifique o projeto e as propostas criadas
                Log::info("Project ID: {$project->id}");
                Log::info("Proposals Count: " . Proposal::where('project_id', $project->id)->count());

                ArrangePositions::run($project->id);
            });
    }
}

