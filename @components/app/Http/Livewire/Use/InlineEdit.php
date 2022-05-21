<?php

namespace App\Http\Livewire\Use;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class InlineEdit extends Component
{

    public function render()
    {
        return view('livewire.use.inline-edit', [
            'users' => User::select('id', 'name')
                ->limit(5)
                ->get()
        ]);
    }
}
