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
                    <a href="{{route('admin.posts.create')}}" class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Create post</a>

                    <ul class="grid-cols-3 w-full">
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <li class="">
                                    <div class="post p-4">
                                        <div class="banner" style="width: 100%; height: 180px;border-radius: 10px;background-position: center;background-size:cover;background-image: url('{{ URL::to('/')}}/{{$post->image }}')"></div>

                                        <h2 class="text-lg mt-2 mb-2 text-white font-bold"><a class="hover:underline" href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                                        <p class="block mb-2">{{ $post->description }}</p>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="underline">Edit</a>
                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="underline">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li>No Posts</li>
                        @endif
                    </ul>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
