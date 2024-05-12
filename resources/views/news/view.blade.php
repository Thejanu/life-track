<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $item->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mx-auto max-w-[400px] mb-12">

                        <p>{!! nl2br($item->summary) !!}</p>

                        <br>
                        <hr>
                        <br>
                        <p>{!! nl2br($item->details) !!}</p>

                        <br>


                        <div class="flex items-center mt-4">
                            <x-primary-link href="{{$item->link}}" target="_blank">
                                {{ __('View External Link') }}
                            </x-primary-link>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>