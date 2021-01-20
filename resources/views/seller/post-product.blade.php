<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>
<!-- 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> -->
                <form method="POST" action="{{ route('save.product') }}">
                @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="price" value="{{ __('Price') }}" />
                        <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Post') }}
                        </x-jet-button>
                    </div>
                </form>
            <!-- </div>
        </div>
    </div> -->
</x-app-layout>