<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Select2 extends Component
{
    public $usersss;
    public function render()
    {
        return view('livewire.select2', [
            'users' => User::select('id', 'name')
                ->limit(10)
                ->get()
        ]);
    }
}
