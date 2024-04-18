<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $category->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="banner" style="height: 150px; width: 150px;border-radius: 100%;background-position: center;background-size:cover;background-image: url('{{ URL::to('/')}}/{{$category->image }}')"></div>

                    <span class="id block mt-4 mb-4">ID: {{ $category->id }}</span>
                    <p class="desc mb-4">{{ $category->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
