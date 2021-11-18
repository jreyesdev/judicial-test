<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factura detalle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-2">
                <div class="p-6 mb-5">
                    <h3 class="text-gray-500 uppercase">Cliente</h3>
                    <h3 class="text-gray-700 mb-3">{{ $cod[0]->user->name }}</h3>
                    <h3 class="text-gray-500 uppercase">Correo electrónico</h3>
                    <h3 class="text-gray-700 mb-3">{{ $cod[0]->user->email }}</h3>
                    <h3 class="text-gray-500 uppercase">Nº Factura</h3>
                    <h3 class="text-gray-700">{{ $cod[0]->codigo }}</h3>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                @include('facturas.detalleListado')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
