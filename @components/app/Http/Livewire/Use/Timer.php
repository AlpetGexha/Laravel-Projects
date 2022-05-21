<?php

namespace App\Http\Livewire\Use;

use Livewire\Component;

class Timer extends Component
{
    public $timer;
    /**
     * @param $time int - time in seconds
     * 
     * @return int
     */
    public function mount(int $timer)
    {
        $this->timer = $timer;
    }

    public function startAgain()
    {
        return $this->timer;
    }

    public function render()
    {
        return view('livewire.use.timer');
    }
}
