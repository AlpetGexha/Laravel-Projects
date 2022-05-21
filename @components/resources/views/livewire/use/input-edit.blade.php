<div>
    <ul class="list-group">
        @forelse ($users as $user)
            <li class="list-group-item">
                <div class="d-flex bd-highlight mb-3">
                    <div class="p-2 bd-highlight">{{ $user->name }}</div>
                    <div class="ms-auto p-2 bd-highlight">

                        @livewire('input-edit', ['model' => $user, 'field' => 'name'],
                        key($user->name))
                        
                    </div>
                </div>
            </li>
    </ul>
@empty
    <span class="text-danger text-center">No results</span>
    @endforelse

</div>
{{-- @livewire('component.with-switch', ['model' => $post, 'field' => 'status'],
key($post->id)) --}}
