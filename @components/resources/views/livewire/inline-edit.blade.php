<div x-data="
        {
             isEditing: false,
             isName: '{{ $isName }}',
             focus: function() {
                const textInput = this.$refs.textInput;
                textInput.focus();
                textInput.select();
             }
        }
    " x-cloak>
    <div x-show="!isEditing" 
            x-on:click="isEditing = true; $nextTick(() => focus())">
        <span style="text-decoration: underline;" class="inline-edit">
            {{ $origName }}
        </span>
    </div>

    <div x-show="isEditing" class="flex flex-col">
        <form class="flex" wire:submit.prevent="save">
            <x-input shadowless 
                        wire:model.lazy="newName" 
                        x-ref="textInput" 
                        x-on:keydown.enter="isEditing = false"
                        x-on:keydown.escape="isEditing = false" />
            <button type="button" class="btn btn-sm btn-dark" title="Cancel" 
                x-on:click="isEditing = false">
               Cancel
            </button>

            <button type="submit" class="btn btn-sm btn-primary" title="Save"
                x-on:click="isEditing = false"> 
                Save
            </button>
        </form>
         <small class="text-muted">Enter to save, Esc to cancel</small>
    </div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
</div>
