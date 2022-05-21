<x-app-layout>
    <h1 class="h1">Toogle Edit</h1>
    <x-card header='ToogleEdit'>
        <livewire:use.toggle-edit />
    </x-card>

    <x-card header='InputEdit'>
        <livewire:use.input-edit />
    </x-card>

    <x-card header='InLine'>
        <livewire:use.inline-edit />
    </x-card>

    <x-card header='LiveSearch'>
        <span class="text-muted">
            {{ __('I recomand this only if u have small data and not important data.  If u have importand data or big data Use Livewire Instand cuz its more secure') }}</span>
        <livewire:live-search />
    </x-card>

    <x-card header='Timer'>
        <livewire:use.timer :timer='10' />
    </x-card>

    <x-card header='confirm Button'>
        <livewire:confirm-button />
    </x-card>
</x-app-layout>
