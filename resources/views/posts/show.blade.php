<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post Detail
        </h2>
    </x-slot>
    <div class="card p-2 bg-blue-200 mb-10 p-10">
        <h2 class="text-3xl">{{ $post->title }}</h2>
        <img src="{{ asset("img/$post->photo") }}" alt="photo" >
        <p>{{ $post->description }}</p>
         <div class="bg-info flex justify-between mt-3">
        <p>Created at <b><a href="">{{ $post->created_at->diffForHumans() }}</a></b></p>
    </div>
    </div>
</x-app-layout>
