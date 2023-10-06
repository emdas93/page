<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Board;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = new User();
        $user->user_email = 'emdas93@gmail.com';
        $userData = $user->get();

        $board = new Board();
        $board->user_id = $userData[0]->id;
        $boardData = $board->orderBy('id','ASC')->get();
        
        $firstId = $boardData[0]->id;
        $lastId = $boardData[count($boardData)-1]->id; 

        return [
            'board_id' => $this->faker->numberBetween($firstId, $lastId),
            'post_title' => $this->faker->sentence(),
            'post_content' => $this->faker->sentence(),
            'user_id' => $userData[0]->id,
            'post_views' => 0
        ];
    }
}
