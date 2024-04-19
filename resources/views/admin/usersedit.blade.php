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
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
                                Name
                            </label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" id="name" name="name" type="text" value="{{ $user->name }}" required="required" autofocus="autofocus" autocomplete="name">
                        </div>
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="role">
                                Role
                            </label>
                            <select name="role" id="role" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                <option value="admin" @if($user->isAdmin()) selected="selected" @endif>Admin</option>
                                <option value="" @if(!$user->isAdmin()) selected="selected" @endif>Normal</option>
                            </select>
                        </div>
                        <button type="submit" class="mt-6 btn btn-primary btn__classic">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
