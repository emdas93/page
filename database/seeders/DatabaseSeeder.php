<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = \App\Models\User::where('user_email', 'emdas93@gmail.com')->get();
        if(count($adminUser) == 0) {
            if($adminUser) {
                \App\Models\User::factory(1)->sequence(
                    [
                        'user_email' => 'emdas93@gmail.com',
                        'user_name' => '추승협',
                        'user_grade' => 0,
                    ],
                   
                )->create();    
            }
        }

        
        \App\Models\User::factory(5)->create();
        \App\Models\Board::factory(3)->create();
        \App\Models\Post::factory(100)->create();
    }
}
