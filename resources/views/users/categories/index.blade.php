<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Categories') }}
    </h2>
</x-slot>
    <div class="container">
        @livewire('category-data-table')

    </div>
</x-app-layout>
