@props(['buttonText' => __('Delete')])

<div x-data="{ initial: true, deleting: false }" class="text-sm ">
    <button
        x-on:click.prevent="deleting = true; initial = false"
        x-show="initial"
        x-on:deleting.window="$el.disabled = true"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        class="btn btn-danger btn-sm"
    >
        {{ $buttonText }}
    </button>

    <div
        x-show="deleting"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class=""   
    >
        <span class="text-dark">@lang('Are you sure?')</span>

        <form x-on:submit="$dispatch('deleting')" {{ $attributes }}>
            {{-- @csrf
            @method('delete') --}}

            <button
                x-on:click="$el.form.submit()"
                x-on:deleting.window="$el.disabled = true"
                type="submit"
                class="btn btn-danger btn-sm"
              
            >
                @lang('Yes')
            </button>

            <button
                x-on:click.prevent="deleting = false; setTimeout(() => { initial = true }, 150)"
                x-on:deleting.window="$el.disabled = true"
                class="btn btn-info btn-sm"
            >
                @lang('No')
            </button>
        </form>
    </div>
</div>