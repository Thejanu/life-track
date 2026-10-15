<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add News Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('addNews') }}" class="mx-auto max-w-[400px] mb-12">
                        @csrf


                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autocomplete="name" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="link" :value=" __('Link')" />
                            <x-text-input id="link" class="block mt-1 w-full" type="text" name="link" :value="old('link')" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('link')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="summary" :value=" __('Summary')" />
                            <x-textarea id="summary" class="block mt-1 w-full" type="text" name="summary" :value="old('summary')" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('summary')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="details" :value=" __('Details')" />
                            <x-textarea id="details" class="block mt-1 w-full" type="text" name="details" :value="old('details')" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('details')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>