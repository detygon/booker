<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
                <div class="flex-none items-center bg-white rounded-lg shadow">
                    <div class="flex space-x-10 px-3 py-5">
                        <div class="pl-3 text-blue-900 mt-3">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M21 9.5v3c0 2.485-4.03 4.5-9 4.5s-9-2.015-9-4.5v-3c0 2.485 4.03 4.5 9 4.5s9-2.015 9-4.5zm-18 5c0 2.485 4.03 4.5 9 4.5s9-2.015 9-4.5v3c0 2.485-4.03 4.5-9 4.5s-9-2.015-9-4.5v-3zm9-2.5c-4.97 0-9-2.015-9-4.5S7.03 3 12 3s9 2.015 9 4.5-4.03 4.5-9 4.5z">
                                </path>
                            </svg>
                        </div>
                        <div class="">
                            <p class="mb-2 text-sm font-medium opacity-75">
                                Total d'observateurs
                            </p>
                            <p class="text-lg font-semibold text-gray-900">
                                0
                            </p>
                        </div>
                    </div>
                    {{-- <div
                        class="w-full bg-blue-900 rounded-b-lg p-2 text-sm text-center text-white font-semibold">
                        <a href="http://saham-attestation.test/stocks">Consulter</a>
                    </div> --}}
                </div>
                <div class="items-center bg-white rounded-lg shadow">
                    <div class="flex space-x-10 px-3 py-5">
                        <div class="pl-3 text-green-500 mt-3">
                            <svg class="w-8 h-8" fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-blue-900">
                                Observateurs verifiés
                            </p>
                            <p class="text-lg font-semibold text-gray-900">
                                0
                            </p>
                        </div>
                    </div>
                    {{-- <div
                        class="w-full bg-green-600 rounded-b-lg p-2 text-sm text-center text-white font-semibold">
                        <a href="http://saham-attestation.test/attestations">Consulter</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div>
            <livewire:agents-table>
        </div>
    </div>
</x-app-layout>
