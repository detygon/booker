<div class="container mx-auto px-6 sm:px-12 relative">
    @if (session()->has('error'))
        <div class="alert my-5 flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
            <div
                class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-red-500">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-red-800">
                    Error
                </div>
                <div class="alert-description text-sm text-red-600">
                    This is an alert message, alert message goes here..!
                </div>
            </div>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert my-5 flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
            <div
                class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-green-500">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-green-800">
                    Success
                </div>
                <div class="alert-description text-sm text-green-600">
                    This is an alert message, alert message goes here..!
                </div>
            </div>
        </div>
    @endif
    <div class="shadow rounded bg-white px-5 py-8 w-full">
        <form wire:submit.prevent="search" class="flex items-center justify-between space-x-2">
            <input placeholder="Entrer votre code" type="search"
                class="block flex-1 bg-gray-200 focus:shadow text-gray-700 font-bold rounded-lg px-4 py-3"
                wire:model.defer="code" />

            <button type="submit"
                class="px-4 py-4 bg-purple-600 font-semibold uppercase text-xs hover:bg-blue-400 rounded-lg text-white">Rechercher</button>
        </form>
    </div>

    <div class="my-8">
        @unless($agent)
            <x-empty-state message="{{ $code ? 'Nous n\'avons retrouvé aucun resultat' : '' }}"></x-empty-state>
        @else
            <x-jet-form-section submit="updateProfileInformation">
                <x-slot name="title">
                    {{ __('Informations') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Vérification et mise à jour de mes informations') }}
                </x-slot>

                <x-slot name="form">
                    <!-- Profile Photo -->
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                                    photoName = $refs.photo.files[0].name;
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        photoPreview = e.target.result;
                                                    };
                                                    reader.readAsDataURL($refs.photo.files[0]);
                                            " />

                            <x-jet-label for="photo" value="Photo" />

                            <!-- Current Profile Photo -->
                            <div class="mt-2" x-show="! photoPreview">
                                <img src="{{ $agent->profile_photo_url }}" alt="{{ $agent->name }}"
                                    class="rounded-full h-20 w-20 object-cover">
                            </div>

                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview">
                                <span class="block rounded-full w-20 h-20"
                                    x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <x-jet-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                {{ __('Choisissez votre photo') }}
                            </x-jet-secondary-button>

                            <x-jet-input-error for="photo" class="mt-2" />
                        </div>
                    @endif

                    <!-- Nom -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="last_name" value="Nom" />
                        <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name"
                            autocomplete="last_name" />
                        <x-jet-input-error for="last_name" class="mt-2" />
                    </div>

                    <!-- Prénoms -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="first_name" value="Prénoms" />
                        <x-jet-input id="first_name" type="text" class="mt-1 block w-full"
                            wire:model.defer="state.first_name" autocomplete="first_name" />
                        <x-jet-input-error for="first_name" class="mt-2" />
                    </div>

                    <!-- Numéro de télephone -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="phone_number" value="Numéro de télephone" />
                        <x-jet-input id="phone_number" type="text" class="mt-1 block w-full"
                            wire:model.defer="state.phone_number" />
                        <x-jet-input-error for="phone_number" class="mt-2" />
                    </div>

                    <!-- Bureau de vote -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="voting_station" value="Bureau de vote" />
                        <x-jet-input id="voting_station" type="text" class="mt-1 block w-full"
                            wire:model.defer="state.voting_station" />
                        <x-jet-input-error for="voting_station" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Entregistré.') }}
                    </x-jet-action-message>

                    <x-jet-button class="bg-indigo-600 hover:bg-blue-400">
                        {{ __('Entregister') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-form-section>

        @endunless
    </div>
</div>
