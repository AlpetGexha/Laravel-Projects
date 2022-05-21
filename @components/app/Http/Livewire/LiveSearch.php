<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class LiveSearch extends Component
{
    public function render()
    {

        return view('livewire.live-search',[
            'users' => User::select('id','name','email')
            ->limit(20)
            ->get()
        ]);
    }
}
