<x-app-layout>

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sub Categories') }}
        </h2>
        <a href="{{route('users.subcategories.create')}}" class="flex items-center bg-green-500 hover:bg-green-700 font-bold rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 9V5a1 1 0 112 0v4h4a1 1 0 110 2h-4v4a1 1 0 11-2 0v-4H5a1 1 0 110-2h4z" clip-rule="evenodd" />
            </svg>
            {{__('Create New')}} {{ __('Sub Category') }}
        </a>
    </div>
</x-slot>
    <div class="container px-4">
        @livewire('sub-category-data-table', ['subcategories' => $subcategories])

    </div>
</x-app-layout>
