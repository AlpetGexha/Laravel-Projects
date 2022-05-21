@props(['footer' => false, 'header'])
<div class="card shadow  mt-2 mb-1">
    <div class="card-header">
        {{ $header }}
    </div>

    <div class="card-body shadow-sm">
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
