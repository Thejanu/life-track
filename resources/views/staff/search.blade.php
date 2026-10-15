<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Medical Records') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('searchMedicalProfiles') }}" class="mx-auto max-w-[400px] mb-12">
                        @csrf


                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="nic" :value="__('NIC')" />
                            <x-text-input id="nic" class="block mt-1 w-full" type="text" name="nic" :value="old('nic')" required autocomplete="name" value="" />
                            <x-input-error :messages=" $errors->get('nic')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Search') }}
                            </x-primary-button>
                        </div>
                    </form>

                    @if (isset($user))
                    <hr />
                    <ul class="mt-4">
                        <li>- Name: {{$user->name}}</li>
                        <li>- DOB: {{$user->dob}}</li>
                        <li>- NIC: {{$user->nic}}</li>
                    </ul>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @foreach($records as $record)
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <ul>
                        <li><small>Date: {{ $record->date }}</small></li>
                        <li>Type: {{ $record->type->name }}</li>
                        <li>Location: {{$record->location}}</li>
                        <li>Details: {{$record->details}}</li>
                    </ul>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</x-app-layout>