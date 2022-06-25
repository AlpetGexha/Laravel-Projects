<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'General',
            'PHP',
            'Laravel',
            'Vue',
            'HTML',
            'CSS',
            'JavaScript',
            'Bootstrap',
        ];

        foreach ($names as $name) {
            ChatRoom::create([
                'name' => $name,
//                'slug' => Str::slug($name),
            ]);
        }
    }
}
