<div class="table-responsive" x-data="{
    search: '',
    users: {{ $users }},
    filteredUsers() {
        return this.users.filter((user) => {
            let query = this.search.toLowerCase();
            return user.name.toLowerCase().includes(query) || user.email.toLowerCase().includes(query)
        });
    }
}">
    <table class="table table-striped table-hover">
        <thead>

            <input type="text" x-model="search" class="form-control">

            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="user, index in filteredUsers">
                <tr>
                    <td x-text="index + 1"></td>
                    <td x-text="user.name"></td>
                    <td x-text="user.email"></td>
                </tr>
            </template>
        </tbody>
    </table>
</div>
