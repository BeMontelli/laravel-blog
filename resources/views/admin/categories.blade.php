<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('admin.categories.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Create category</a>

                    <ul class="grid-cols-3 w-full">
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <li class="">
                                    <div class="categorie p-4">

                                        <div class="banner" style="height: 50px; width: 50px;border-radius: 100%;background-position: center;background-size:cover;background-image: url('{{ URL::to('/')}}/{{$category->image }}')"></div>

                                        <h2 class="text-lg mb-2 text-white font-bold"><a class="hover:underline" href="{{ route('admin.categories.show', $category->id) }}">{{ $category->title }}</a></h2>
                                        <p class="block mb-2">{{ $category->description }}</p>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="underline">Edit</a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="underline">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li>No Categories</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
