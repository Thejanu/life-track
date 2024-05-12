<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Medical Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @foreach($records as $record)
            @php
            $files = Storage::files("medical-records/$record->id");
            @endphp
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{$record->id}}
                    <ul>
                        <li><small>Date: {{ $record->date }}</small></li>
                        <li>Type: {{ $record->type->name }}</li>
                        <li>Location: {{$record->location}}</li>
                        <li>Details: {{$record->details}}</li>
                    </ul>
                    @if (count($files) > 0)

                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($files as $image)
                        <div class="">
                            <div class="col-sm-6 col-md-4 col-lg-3 item">
                                <a href="/view-image?url={{$image}}" data-lightbox="photos">
                                    <img class="img-fluid" src="/view-image?url={{$image}}">
                                </a>
                            </div>
                            <!-- <div class="thumbnail">
                                        <img src="/view-image?url={{$image}}" alt="">
                                    </div> -->
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endforeach


        </div>
    </div>
</x-app-layout>