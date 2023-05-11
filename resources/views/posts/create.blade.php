<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="w-[500px] m-auto">
        @csrf

        <div class="mb-3">
            <x-input-label for="catagory" :value="__('Catagory')" />
            <select name="catagory_id" id="catagory"
                class="bg-violet-50 border border-dark-300 text-violet-900 text-sm rounded-lg  block w-full p-2.5">
                <option selected disabled>Choose a Category</option>
                @foreach ($catagories as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"
                required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="photo" :value="__('Add Image')" />
            <x-text-input id="photo"
                class="block w-full text-sm text-slate-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-violet-50 file:text-violet-700
        hover:file:bg-violet-700 hover:file:text-violet-50 file:cursor-pointer file:mt-1
      "
                type="file" name="photo" autofocus autocomplete="photo" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="is_feature" :value="__('Is_feature')" />
            <x-text-input id="is_feature" class="appearance-none checked:bg-blue-500 mt-2" type="checkbox"
                value="1" name="is_feature" autocomplete="is_feature" />
            <x-input-error :messages="$errors->get('is_feature')" class="mt-2" />
        </div>

        <button type="submit" class="btn-primary">Create</button>
    </form>

    </form>
</x-app-layout>
