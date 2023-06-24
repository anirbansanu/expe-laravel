<div class="container mx-auto px-4">
    <div class="w-full flex items-center justify-end m-2 p-2">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Search..." class="w-half px-4 py-2 border border-gray-300 rounded-md mb-4" />
    </div>

    <table class="border-collapse table-auto w-full">
        <thead class="bg-indigo-300 ">
            <tr>
                <th class="text-left py-2 px-4 border-b border-gray-300">Sl no.</th>
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
            @foreach ($categories as $key=>$category)
                <tr>
                    <td class="text-start py-2 px-4 border-b border-gray-300">{{ $key+1 }}</td>
                    @foreach ($columns as $column)
                        <td class="text-start py-2 px-4 border-b border-gray-300">{{ $category[$column] }}</td>
                    @endforeach
                    @if (isset($actions) && count($actions)>0)
                        <td class="text-center py-2 px-4 border-b border-gray-300 actions content-center">
                            <div class="relative inline-block">
                                <button data-dropdown-placement="left-end" class="dropdown-toggle z-0 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none light:text-white focus:ring-gray-50 light:bg-gray-800 light:hover:bg-gray-700 light:focus:ring-gray-600" type="button">
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div class="dropdown-menu absolute hidden rela z-50 right-0 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 light:bg-gray-700 light:divide-gray-600">
                                    <div class="py-2">
                                        @forelse ($actions['others'] as $action_key=>$action)
                                            <a href="{{route($action['route'],$category)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white">
                                                {{$action['title']}}
                                            </a>
                                        @empty

                                        @endforelse
                                    </div>
                                    <ul class="py-2 text-sm text-gray-700 light:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                        @foreach ($actions as $action_key=>$action)
                                            @if (isset($action['title']))
                                                @if ("delete" == strtolower($action['title']))
                                                    <li class="text-left">
                                                        <form action="{{route($action['route'],$category)}}" method="POST">
                                                            @method("DELETE")
                                                            @csrf
                                                            <button type="submit" class="text-left w-full block px-4 py-2 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">{{$action['title']}}</button>
                                                        </form>
                                                    </li>
                                                @else
                                                    <li class="text-left ">
                                                        <a href="{{route($action['route'],$category)}}" class="block px-4 py-2 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">{{$action['title']}}</a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach

                                    </ul>

                                </div>
                            </div>
                            {{-- @foreach ($actions as $action_key=>$action)
                                <a href="{{$action['route']}}" class="font-medium text-blue-600 light:text-blue-500 hover:underline">{{$action['title']}}</a>
                            @endforeach --}}
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
<script>
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const dropdownMenus = document.querySelectorAll('.dropdown-menu');

    dropdownToggles.forEach((toggle, index) => {
      toggle.addEventListener('click', function(event) {
        dropdownMenus.forEach((menu, menuIndex) => {
            if (index === menuIndex) {
            menu.classList.toggle('hidden');
            } else {
            menu.classList.add('hidden');
            }
        });
      });
    });

    document.addEventListener('click', function(event) {
      dropdownMenus.forEach((menu) => {
        if (!event.target.closest('.actions')) {
          menu.classList.add('hidden');
        }
      });
    });
  </script>
