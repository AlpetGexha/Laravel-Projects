<div x-data="{ timer: {{ $timer }} }"
    x-init="window.setInterval(() => { if(timer > 0) timer = timer - 1; }, 1000)">
    <div x-show="timer > 0">
        Seconds left:
        <div x-text="timer" class="text-2xl"></div>
    </div>
    <div x-show="timer == 0">
        Time its Over!
    </div>
    
</div>
