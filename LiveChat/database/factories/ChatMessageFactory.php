<?php

namespace Database\Factories;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ChatMessageFactory extends Factory
{

    protected $model = ChatMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message' => $this->faker->sentence,
            'user_id' => $this->faker->randomElement(User::all())['id'],
            'chat_room_id' => $this->faker->randomElement(ChatRoom::all())['id'],
        ];
    }
}
