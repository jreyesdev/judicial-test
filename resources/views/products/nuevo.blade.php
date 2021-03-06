<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($titulo) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="w-2/3">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @include('products.formCreate')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
