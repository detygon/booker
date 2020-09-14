<x-guest-layout>
    <div class="container mx-auto px-6 sm:px-12 flex flex-col-reverse sm:flex-row relative">
        <div class="sm:w-6/12 relative z-10">
            <x-svg.men></x-svg.men>
        </div>
        <div
            class="sm:w-5/12 xl:w-4/12 flex flex-col items-start sm:items-end sm:text-right ml-auto mt-8 sm:mt-0 relative z-10 xl:pt-20 mb-16 sm:mb-0">
            <h1 class="text-4xl lg:text-5xl text-blue-900 leading-none mb-4 font-black">Bienvenue</h1>
            <p class="lg:text-lg mb-4 sm:mb-12 text-blue-900">Vous êtes convié à verifier vos informations
                d'observateur ici.</p>
            <a href="{{ route('verification') }}"
                class="font-semibold text-lg bg-purple-600 hover:bg-blue-400 text-white py-3 px-12 rounded-full">
                Verifier mes informations
            </a>
        </div>
        <x-svg.skyline></x-svg.skyline>
    </div>
</x-guest-layout>
