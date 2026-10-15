<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            @if (Auth::user()->role === "Admin")
            <x-primary-link href="/news/add" class="ms-auto me-3">
                {{ __('Add News Item') }}
            </x-primary-link>
            @endif
        </div>
    </x-slot>
    <div class="py-12">

        @if (count($news) == 0)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>No items available in your news feed.</p>
                </div>
            </div>

        </div>
        @endif


        @foreach($news as $item)

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg">{{ $item->title }}</h3>

                    <p>{{ $item->summary }}</p>
                    <small class="inline-block mb-2 text-muted text-xs">Published at: {{$item->created_at}}</small>
                    <br>
                    <x-primary-link href="/news/view/{{$item->id}}">View</x-primary-link>
                </div>
            </div>

        </div>

        @endforeach
    </div>
</x-app-layout>