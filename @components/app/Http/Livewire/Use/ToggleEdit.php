<?php

namespace App\Http\Livewire\Use;

use App\Models\User;
use Livewire\Component;

class ToggleEdit extends Component
{
    public function render()
    {
        return view('livewire.use.toggle-edit', [
            'users' => User::select('id', 'name', 'status')
                ->limit(5)
                ->get()
        ]);
    }
}
