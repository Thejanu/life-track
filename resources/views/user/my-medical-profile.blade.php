<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Medical Profile') }}
        </h2>
    </x-slot>

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
