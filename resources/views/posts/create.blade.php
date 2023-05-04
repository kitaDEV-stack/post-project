<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
       <form method="POST" action="" class="w-[500px] m-auto">
    @csrf

    <div class="mb-3">
        <x-input-label for="catagory" :value="__('Catagory')"/>
        <select name="category_id" id="catagory" class="bg-gray-400 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected>Choose a Category</option>
            @foreach ($catagories as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <x-input-label for="title" :value="__('TITLE')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div class="mb-3">
        <x-input-label for="description" :value="__('description')" />
        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

</form>
</x-app-layout>

