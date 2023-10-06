<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BoardFactory extends Factory
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

        return [
            'board_name' => $this->faker->name(),
            'user_id' => $userData[0]->id,
            'parent_id' => 1,
        ];
    }
}
