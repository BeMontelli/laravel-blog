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
                    <ul class="grid-cols-3">

                        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input value="{{ $post->title }}" type="text" class="text-black form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="body">description</label>
                                <textarea class="text-black form-control" id="description" name="description" rows="3" required>{{ $post->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">content</label>
                                <textarea class="text-black form-control" id="content" name="content" rows="3" required>{{ $post->content }}</textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </form>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
