<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Medical Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('user.addRecord') }}" enctype="multipart/form-data">
                        @csrf

                        @if (Auth::user()->role === "Staff")
                        <div class="mb-3">
                            <label for="nic" class="block font-medium text-sm text-gray-700">NIC</label>
                            <input type="text" name="nic" id="nic" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>
                        @endif

                        <!-- Allergies -->
                        <div class="mb-3">
                            <label for="medical_record_type_id" class="block font-medium text-sm text-gray-700">Type</label>
                            <select type="text" name="medical_record_type_id" id="medical_record_type_id" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                                <option value="">Select</option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Vaccinations -->
                        <div class="mb-3">
                            <label for="location" class="block font-medium text-sm text-gray-700">Location</label>
                            <input type="text" name="location" id="location" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>

                        <!-- Diagnosis -->
                        <div class="mb-3">
                            <label for="date" class="block font-medium text-sm text-gray-700">Date</label>
                            <input type="date" name="date" id="date" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                        </div>

                        <!-- Surgeries -->
                        <div class="mb-3">
                            <label for="details" class="block font-medium text-sm text-gray-700">Details</label>
                            <textarea name="details" id="details" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="assets" class="block font-medium text-sm text-gray-700">Files</label>
                            <input type="file" name="assets[]" id="assets" multiple class="mt-1 p-2 border border-gray-300 rounded-md w-full" accept="image/jpeg">
                        </div>


                        <!-- Submit button -->
                        <x-primary-button class="mt-3">
                            {{ __('Save') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>