@include('layouts.front.head')

<div class="grid">
    <div id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        {!! $content !!}

        <ul class="grid grid-cols-3 grid-rows-3 gap-4">
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

@include('layouts.front.footer')
