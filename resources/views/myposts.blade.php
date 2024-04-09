<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('admin.posts.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Create post</a>

                    <ul class="grid-cols-3">
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <li class="">
                                    <div class="post p-4">
                                        <h2 class="text-white">{{ $post->title }}</h2>
                                        <p>{{ $post->description }}</p>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li>No Posts</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
