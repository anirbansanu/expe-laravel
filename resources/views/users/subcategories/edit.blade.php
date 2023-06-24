<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}  {{ __('Sub Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('users.subcategories.update', $subcategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="large" class="block mb-2 text-base font-medium text-gray-900 light:text-dark">Select Category</label>
                            <select id="large" name="category" class="select-2 block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500">
                                <option selected>Choose a Category</option>
                                @forelse ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $subcategory->category->id?"selected":"" }}>{{$category->name}}</option>
                                @empty
                                    <option disabled>No Data</option>
                                @endforelse

                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="name" class="font-bold text-gray-800">Category Name</label>
                            <input type="text" name="name" id="name" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full" value="{{ $subcategory->name }}">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="category_description" class="font-bold text-gray-800">Category Description</label>
                            <textarea name="category_description" id="category_description"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500" rows="4">{{ $subcategory->description }}</textarea>

                            @error('category_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
