<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            All posts
        </h2>
    </x-slot>

    @if (session('success'))
        <div role="alert">
            {{ session('success') }}
            <button type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
                {{-- <div class="card p-2 bg-blue-200 mb-10 p-10 max-h">
                    <h2 class="text-3xl"> <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                    <a href="{{ route('posts.show', $post->id) }}"><img src="{{ asset("img/$post->photo") }}"
                            alt="photo"></a>
                    <p>{{ $post->description }}</p>
                    <div class="bg-info flex justify-between mt-3">
                        <p>Post By <b><a
                                    href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></b>
                        </p>
                        <p>Created at <b><a href="">{{ $post->created_at->diffForHumans() }}</a></b></p>
                    </div>
                </div> --}}
                <div class="w-full max-w-3xl px-8 py-4 mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800 mx-auto">
                    <div class="flex justify-center -mt-16 md:justify-end">
                        <a href="{{ route('posts.show', $post->id) }}"><img
                                class="object-cover w-20 h-20 border-2 border-blue-500 rounded-full dark:border-blue-400"
                                alt="Testimonial avatar" src="{{ asset("img/$post->photo") }}"></a>
                    </div>

                    <h2 class="mt-2 mb-5 text-xl font-semibold text-gray-800 dark:text-white md:mt-0"><a
                            href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>

                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-200">{{ $post->description }}</p>

                    <div class="flex justify-between mt-4">
                        <a href="{{ route('users.show', $post->user->id) }}"
                            class="text-lg font-medium text-blue-600 dark:text-blue-300" tabindex="0"
                            role="link">{{ $post->user->name }}</a>
                        <p class="text-lg font-medium text-blue-600 dark:text-blue-300">Created at <b><a
                                    href="">{{ $post->created_at->diffForHumans() }}</a></b></p>
                    </div>

                   <div class="mt-3">
                    <button class="btn btn-success">
                        <a href="{{ route('posts.edit', $post->id) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </button>
                    <form class="inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-error">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                   </div>

                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
