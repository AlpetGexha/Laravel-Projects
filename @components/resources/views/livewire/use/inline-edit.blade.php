<ul class="list-group">
    @forelse ($users as $user)
        <li class="list-group-item">
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight">{{ $user->name }}</div>
                <div class="ms-auto p-2 bd-highlight">


                    <livewire:inline-edit :model="'\App\Models\User'" :entity="$user" :field="'name'"
                        :key="'users'.$user->id" />

                </div>
            </div>
        </li>
</ul>
    @empty
        <span class="text-danger text-center">No results</span>
    @endforelse


{{-- @livewire('component.with-switch', ['model' => $post, 'field' => 'status'],
        key($post->id)) --}}
