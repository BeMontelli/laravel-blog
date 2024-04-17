@include('layouts.front.head')

<div class="grid">
    <div id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        {!! $content !!}

        <ul class="categories">
            @if(!empty($categories) && count($categories) > 0)
                @foreach($categories as $category)
                    <a href="{{ route('page.blog.category',$category->id) }}" class="inline-flex bg-white text-black rounded-full px-10">{{$category->title}}</a>
                @endforeach
            @endif
        </ul>

        <ul class="grid-cols-3">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <li class="">
                        <div class="post p-4">
                            <h2 class="text-white"><a href="{{ route('page.blog.single',$post->id) }}">{{ $post->title }}</a></h2>
                            @if(!empty($post->user->name))
                                <span class="block">by {{ $post->user->name }}</span>
                            @endif

                            @if (!empty($post->categories) && count($post->categories) > 0)
                                <div class="categories">
                                    <span>cats :</span>
                                    @foreach ($post->categories as $k => $category)
                                        <span> @if($k!=0)/@endif {{ $category->title }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="description" style="margin: 10px 0 0 0">
                                <p>{{ $post->description }}</p>
                            </div>
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
