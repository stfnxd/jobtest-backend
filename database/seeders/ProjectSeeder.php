<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::updateOrCreate(
            [
                'name' => 'Test User',
                'email' => 'test@test.test',
                'password' => Hash::make('Test123'),
            ]
        );

        $users = User::factory()->count(1)->create();
        foreach ($users as $user){
        Project::factory()
            ->count(5)
            ->hasComments(2000)
            ->create(['owner' => $user->id]);
        }
        
    }
}
