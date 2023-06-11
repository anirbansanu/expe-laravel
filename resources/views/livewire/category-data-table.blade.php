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
            @foreach ($categories as $category)
                <tr>
                    @foreach ($columns as $column)
                        <td>{{ $category[$column] }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
</div>
