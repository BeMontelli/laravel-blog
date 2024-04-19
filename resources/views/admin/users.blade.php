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

                    <ul class="grid-cols-3 w-full">
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <li class="">
                                    <div class="user p-4">
                                        <h2 class="text-lg mb-2 text-white font-bold"><a class="hover:underline" href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></h2>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="underline">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="underline">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li>No Users</li>
                        @endif
                    </ul>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
