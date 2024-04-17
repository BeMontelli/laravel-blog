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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.posts.store') }}" method="post">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="text-black form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="body">description</label>
                            <textarea class="text-black form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="body">content</label>
                            <textarea class="text-black form-control" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <br>
                        <fieldset class="mb-6 text-white">
                        <legend>Categories</legend>
                        @if (!empty($categories) && count($categories) > 0)
                            @foreach ($categories as $category)
                                <div>
                                    <input type="checkbox" id="cat-{{ $category->id }}" name="categories[]" value="{{ $category->id }}" />
                                    <label for="cat-{{ $category->id }}">{{ $category->title }}</label>
                                </div>
                                @endforeach
                                @endif
                        </fieldset>
                        <br>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
