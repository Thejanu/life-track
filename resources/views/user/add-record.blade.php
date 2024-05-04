<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Allergies -->
                        <div>
                            <label for="allergies" class="block font-medium text-sm text-gray-700">Allergies</label>
                            <input type="text" name="allergies" id="allergies" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="allergies_documents" id="allergies_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- Vaccinations -->
                        <div>
                            <label for="vaccinations" class="block font-medium text-sm text-gray-700">Vaccinations</label>
                            <input type="text" name="vaccinations" id="vaccinations" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="vaccinations_documents" id="vaccinations_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- Diagnosis -->
                        <div>
                            <label for="diagnosis" class="block font-medium text-sm text-gray-700">Diagnosis</label>
                            <input type="text" name="diagnosis" id="diagnosis" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="diagnosis_documents" id="diagnosis_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- Surgeries -->
                        <div>
                            <label for="surgeries" class="block font-medium text-sm text-gray-700">Surgeries</label>
                            <input type="text" name="surgeries" id="surgeries" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="surgeries_documents" id="surgeries_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- Doctor's visits -->
                        <div>
                            <label for="doctor_visits" class="block font-medium text-sm text-gray-700">Doctor's Visits</label>
                            <input type="text" name="doctor_visits" id="doctor_visits" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="doctor_visits_documents" id="doctor_visits_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- Emergency room visits -->
                        <div>
                            <label for="emergency_visits" class="block font-medium text-sm text-gray-700">Emergency Room Visits</label>
                            <input type="text" name="emergency_visits" id="emergency_visits" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="emergency_visits_documents" id="emergency_visits_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- X-rays -->
                        <div>
                            <label for="x_rays" class="block font-medium text-sm text-gray-700">X-Rays</label>
                            <input type="text" name="x_rays" id="x_rays" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="x_rays_documents" id="x_rays_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- MRI and CT scans -->
                        <div>
                            <label for="mri_ct_scans" class="block font-medium text-sm text-gray-700">MRI and CT Scans</label>
                            <input type="text" name="mri_ct_scans" id="mri_ct_scans" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="mri_ct_scans_documents" id="mri_ct_scans_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- Prescribed medications -->
                        <div>
                            <label for="medications" class="block font-medium text-sm text-gray-700">Prescribed Medications</label>
                            <input type="text" name="medications" id="medications" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                            <input type="file" name="medications_documents" id="medications_documents" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
