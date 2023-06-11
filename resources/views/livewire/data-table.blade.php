<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="Search...">
    <table>
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>
                        <button wire:click="sortBy('{{ $column }}')">{{ ucfirst($column) }}</button>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    @foreach ($columns as $column)
                        <td>{{ $user->$column }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
