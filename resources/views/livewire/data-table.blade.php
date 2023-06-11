<div>
    <input type="text" wire:model.debounce.300ms="search" placeholder="Search...">
    <table>
        <thead>
            <tr>
                @foreach ($_columns as $_column)
                    <th>
                        <button wire:click="sortBy('{{ $_column['data'] }}')">{{ ucfirst($_column['title']) }}</button>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($_data as $_item)
                <tr>
                    @foreach ($_columns as $_column)
                        <td>{{ $_item->$_column['data'] ?? "" }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $_data->links() }}
</div>
