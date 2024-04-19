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

                    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="title">
                                Title
                            </label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="title" name="title" type="text" value="{{ $post->title }}" required="required" autofocus="autofocus" autocomplete="title">
                        </div>
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="description">
                                Description
                            </label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="description" name="description" type="text" value="{{ $post->description }}" required="required" autofocus="autofocus" autocomplete="description">
                        </div>
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="content">
                                Content
                            </label>
                            <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="content" name="content" required="required" autofocus="autofocus">{{ $post->content }}</textarea>
                        </div>

                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="imageinput">Image</label>
                            <div class="image-area mt-2 border-gray-300 dark:border-gray-700">
                                <img src="{{ URL::to('/')}}/{{$post->image }}" alt="{{$post->image }}">
                                <div class="indic"><span>{{$post->image }}</span></div>
                                <input
                                    type="file"
                                    name="imageinput"
                                    id="imageinput"
                                    class="form-control @error('image') is-invalid @enderror">
                            </div>
                        </div>

                        <fieldset class="mt-6 text-white">
                            <legend class="mb-2 block font-medium text-sm text-gray-700 dark:text-gray-300">Categories</legend>
                            @if (!empty($categories) && count($categories) > 0)
                                <div class="checkboxes flex inline-flex" style="flex-wrap: wrap">
                                    @foreach ($categories as $category)
                                        <div class="p-2" style="width: fit-content;">
                                            <input type="checkbox" id="cat-{{ $category->id }}" name="categories[]" value="{{ $category->id }}" @if (in_array($category->id, $idCategories)) checked @endif />
                                            <label for="cat-{{ $category->id }}">{{ $category->title }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </fieldset>
                        <br>
                        <button type="submit" class="btn btn-primary btn__classic">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
