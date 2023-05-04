<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          All posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($posts as $post)
            <div class="card p-2 bg-blue-200 mb-10 p-10">
                <h2 class="text-3xl">{{ $post->title }}</h2>
                <img src="" alt="photo">
                <p>{{ $post->description }}</p>
                 <div class="bg-info flex justify-between mt-3">
                <p>Post By <b><a href="{{ route('users.show',$post->user->id) }}">{{ $post->user->name }}</a></b></p>
                <p>Created at <b><a href="">{{ $post->created_at->diffForHumans() }}</a></b></p>
            </div>
            </div>

            @empty
            <p>Post Not Found</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
