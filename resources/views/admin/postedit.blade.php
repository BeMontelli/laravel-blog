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
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label class="form-label" for="imageinput">Image:</label>
                            <input
                                type="file"
                                name="imageinput"
                                id="imageinput"
                                class="form-control @error('image') is-invalid @enderror">
                                <img style="max-width: 400px" src="{{ URL::to('/')}}/{{$post->image }}" alt="{{ $post->title }}">
                        </div>
                        <br>
                        <fieldset class="mb-6 text-white">
                            <legend>Categories</legend>
                            @if (!empty($categories) && count($categories) > 0)
                                @foreach ($categories as $category)
                                    <div>
                                        <input type="checkbox" id="cat-{{ $category->id }}" name="categories[]" value="{{ $category->id }}" @if (in_array($category->id, $idCategories)) checked @endif />
                                        <label for="cat-{{ $category->id }}">{{ $category->title }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </fieldset>
                        <br>
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
