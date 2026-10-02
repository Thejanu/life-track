<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Child') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('addChild') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nic" class="block font-medium text-sm text-gray-700">Birth Certificate Number</label>
                            <input type="text" name="nic" id="nic" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>


                        <!-- Vaccinations -->
                        <div class="mb-3">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>

                        <!-- Diagnosis -->
                        <div class="mb-3">
                            <label for="dob" class="block font-medium text-sm text-gray-700">Date of birth</label>
                            <input type="date" name="dob" id="dob" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>




                        <!-- Submit button -->
                        <x-primary-button class="mt-3">
                            {{ __('Add') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>