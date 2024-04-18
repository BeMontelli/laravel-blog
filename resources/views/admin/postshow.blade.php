<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="banner" style="width: 100%; height: 350px;border-radius: 10px;background-position: center;background-size:cover;background-image: url('{{ URL::to('/')}}/{{$post->image }}')"></div>

                    <span class="id block mt-4 mb-4">ID: {{ $post->id }}</span>
                    <p class="desc mb-4">{{ $post->description }}</p>
                    <p class="content block mb-4">{{ $post->content }}</p>

                    <h2 class="txt-lg font-semibold mb-4">Categories</h2>
                    <ul>
                    @if(count($post->categories) > 0)
                        @foreach($post->categories as $category)
                            <li class="">
                                <div class="category">
                                    <p class="text-white">> <a href="{{ route('admin.categories.edit',$category->id) }}" class="underline">{{ $category->title }}</a></p>
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
