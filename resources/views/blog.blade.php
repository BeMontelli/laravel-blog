@include('layouts.front.head')

<div class="grid">
    <div id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
        {!! $content !!}

        <ul class="categories" style="display: flex;flex-wrap: wrap;">
            @if(!empty($categories) && count($categories) > 0)
                @foreach($categories as $category)
                    <a href="{{ route('page.blog.category',$category) }}" class="bg-white text-black rounded-full px-10" style="display: flex;align-content: center;justify-content: flex-start;margin: 0 10px 10px 0">
                        <div class="banner" style="height: 50px; width: 50px;border-radius: 100%;background-position: center;background-size:cover;background-image: url('{{ URL::to('/')}}/{{$category->image }}')"></div>
                        <div style="padding: 5px 15px 5px 5px;display: flex;align-items: center;"><span>{{$category->title}}</span></div>
                    </a>
                @endforeach
            @endif
        </ul>

        <ul class="grid-cols-3">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <li class="">
                        <div class="post p-4">
                            <div class="banner" style="width: 100%; height: 180px;border-radius: 10px;background-position: center;background-size:cover;background-image: url('{{ URL::to('/')}}/{{$post->image }}')"></div>

                            <h2 class="text-white block" style="margin-top: 10px"><a href="{{ route('page.blog.single',$post) }}">{{ $post->title }}</a></h2>
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
