@forelse ($users as $user)
    <div class="row mt-1  mb-1">
        <div class="col">
            {{ $user->name }}
        </div>
        <div class="col">
            <x-main.confirm-button wire:submit.prevent='delete({{ $user->id }})' />
        </div>
    </div>
@empty
    <span class="text-center text-danger"></span>
@endforelse
