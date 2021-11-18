<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Facturas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            @if ($comp)
            <div class="py-6">
                <a href="{{ route('prod.create') }}" class="bg-indigo-500 hover:bg-indigo-600 rounded py-2 px-6 shadow text-white">Generar Facturas</a>
            </div>
            @endif
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @include('facturas.listado')
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-7">{{ $facts->links() }}</div>
        </div>
    </div>
</x-app-layout>
