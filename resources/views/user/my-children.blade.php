<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Children') }}
            </h2>
            <x-primary-link href="/my-children/add" class="ms-auto me-3">
                {{ __('Add Child') }}
            </x-primary-link>
        </div>
    </x-slot>

    <div class="py-12">

        @if (count($children) == 0)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if (count($children) == 0)
                    <p>You haven't added any children</p>
                    @endif
                </div>
            </div>
        </div>
        @endif

        @foreach ($children as $child)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>{{$child->name}}</p>
                    <small>{{$child->dob}}</small>
                    <hr>
                    <br>
                    <x-primary-link href="/add-record?child=1">Add Medical Record</x-primary-link>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</x-app-layout>