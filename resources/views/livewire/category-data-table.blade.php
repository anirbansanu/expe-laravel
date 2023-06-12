<div class="container mx-auto py-6">
    <div class="w-full flex items-center justify-end m-2 p-2">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Search..." class="w-half px-4 py-2 border border-gray-300 rounded-md mb-4" />
    </div>

    <table class="border-collapse table-auto">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th class="text-left py-2 px-4 border-b border-gray-300">
                        <button wire:click="sortBy('{{ $column }}')" class="text-left font-semibold">{{ ucfirst($column) }}</button>
                    </th>
                @endforeach
                @if (isset($actions) && count($actions)>0)
                    <th class="text-start py-2 px-4 border-b border-gray-300">{{ __('Actions') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    @foreach ($columns as $column)
                        <td class="text-start py-2 px-4 border-b border-gray-300">{{ $category[$column] }}</td>
                    @endforeach
                    @if (isset($actions) && count($actions)>0)
                        <td class="text-start py-2 px-4 border-b border-gray-300">
                            @foreach ($actions as $action_key=>$action)
                                <a href="{{$action['route']}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$action['title']}}</a>
                            @endforeach
                        </td>
                    @endif

                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
