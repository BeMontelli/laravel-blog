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
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="title">
                                Title
                            </label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="title" name="title" type="text" value="{{ $category->title }}" required="required" autofocus="autofocus" autocomplete="title">
                        </div>

                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="description">
                                Description
                            </label>
                            <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="description" name="description" required="required" autofocus="autofocus">{{ $category->description }}</textarea>
                        </div>

                        <div class="mt-6 form-group">
                            <label class="form-label" for="imageinput">Image:</label>
                            <input
                                type="file"
                                name="imageinput"
                                id="imageinput"
                                class="form-control @error('image') is-invalid @enderror">
                            <img style="max-width: 400px" src="{{ URL::to('/')}}/{{$category->image }}" alt="{{ $category->title }}">
                        </div>
                        <button type="submit" class="mt-6 btn__classic btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
