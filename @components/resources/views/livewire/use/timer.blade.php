<div x-data="{ timer:  $wire.timer, count: 0, milisecond: '', start: false }"
    x-init="
    window.setInterval(() => { if(timer > 0) timer = timer - 1; }, 1000)
    ">

    <div x-show="timer > 0">
        Seconds left:
        <span x-text="timer"></span> <br>
        <button class="btn btn-dark btn-sm" x-on:click="start = true, count++"> Click me </button> 
        <span x-text="count"></span>
    </div>
    <div x-show="timer == 0">
        <button class="btn btn-dark btn-sm" x-on:click="timer = $wire.timer, count = 0,start = false">
            Restart
        </button>
        <div class="text-danger">
            <span>Rezult</span> <span x-text="count">das</span>
        </div>
    </div>
</div>
