<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ConfirmButton extends Component
{
    public function delete(int $id)
    {
        User::findOrFail($id)->delete();
        $this->emit('refreshProducts', $id);
    }

    public function render()
    {
        return view('livewire.confirm-button', [
            'users' => User::select(['id', 'name'])
                ->limit(10)
                ->get()
        ]);
    }
}
