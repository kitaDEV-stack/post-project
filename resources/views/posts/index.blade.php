<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          All posts
        </h2>
    </x-slot>

    @if (session('success'))
    <div  role="alert">
        {{ session('success') }}
        <button type="button"  data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
            <div class="card p-2 bg-blue-200 mb-10 p-10">
                <h2 class="text-3xl"> <a href="{{ route("posts.show",$post->id) }}">{{ $post->title }}</a></h2>
                <a href="{{ route('posts.show',$post->id) }}"><img src="{{ asset("img/$post->photo") }}" alt="photo" ></a>
                <p>{{ $post->description }}</p>
                 <div class="bg-info flex justify-between mt-3">
                <p>Post By <b><a href="{{ route('users.show',$post->user->id) }}">{{ $post->user->name }}</a></b></p>
                <p>Created at <b><a href="">{{ $post->created_at->diffForHumans() }}</a></b></p>
            </div>
            </div>

            @empty
            <p>Post Not Found</p>
            @endforeach
        </div>
    </div>
</x-app-layout>
