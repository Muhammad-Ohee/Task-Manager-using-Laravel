<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //check if the user with ID 1 exists
        $user = User::find(1);

        // If the user does not exist, create a new user
        if(!$user){
            User::create([
                'id' => 1,  // Manually set the user ID to 1
                'name' => 'Ohee',
                'email' => 'ohee@email.com',
                'password' => bcrypt('ohee'),  // Use appropriate password hashing
            ]);

            echo "User with ID 1 has been created!";
        } else{
            echo "User with ID 1 already exists!";
        }

        // Delete all existing records from the tasks table
        DB::table('tasks')->delete();

        // Truncate the tasks table (deletes all records and resets the ID)
        Task::truncate();


        // Now, you can proceed with creating tasks if the user exists
        if ($user) {
            Task::create(['title' => 'Task 1', 'description' => 'Description 1', 'user_id' => 1]);
            Task::create(['title' => 'Task 2', 'description' => 'Description 2', 'user_id' => 1]);
            Task::create(['title' => 'Task 3', 'description' => 'Description 3', 'user_id' => 1]);
            Task::create(['title' => 'Task 4', 'description' => 'Description 4', 'user_id' => 1]);
            // Add more tasks as needed
        }

        // Seed the tasks table with sample data
        //Task::create(['title' => 'Task 1', 'description' => 'Description 1', 'user_id' => 1]);
        //Task::create(['title' => 'Task 2', 'description' => 'Description 2', 'user_id' => 1]);
        // Add more tasks as needed
    }
}
