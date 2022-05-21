<div class="form-check form-switch">
    <input class="form-check-input" wire:model.lazy="isActive" type="checkbox" role="switch"
        @if ($isActive) checked @endif>
</div>

{{-- @livewire('component.with-switch', ['model' => $post, 'field' => 'status'],
key($post->id)) --}}
