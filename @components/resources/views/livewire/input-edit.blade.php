<input class="form-control" wire:model.lazy="isActive" type="text" @if ($isActive) checked @endif />


{{-- @livewire('component.with-switch', ['model' => $post, 'field' => 'status'],
key($post->id)) --}}
