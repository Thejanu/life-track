<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admins') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('medicalCategories') }}" class="mx-auto max-w-[400px] mb-12">
                        @csrf


                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="details" :value=" __('Details')" />
                            <x-text-input id="details" class="block mt-1 w-full" type="text" name="details" :value="old('details')" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('details')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>


                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Details
                                </th>
                                <!-- <th scope="col" class="px-6 py-3">
                                    Actions
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr class="bg-white border-b ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{$category->name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$category->details}}
                                </td>
                                <!-- <td class="px-6 py-4">
                                    <a href="/users/delete/{{$category->id}}" class="text-red-500">Delete</a>
                                </td> -->
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>