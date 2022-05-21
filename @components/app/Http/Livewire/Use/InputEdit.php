<?php

namespace App\Http\Livewire\Use;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InputEdit extends Component
{
    public function render()
    {
        return view('livewire.use.input-edit',[
            'users' => User::select('id', 'name')
                ->limit(5)
                ->get()
        ]);
    }
}
