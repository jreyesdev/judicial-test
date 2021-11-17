<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            @if ($admin)
            <div class="py-6">
                <a href="#" class="bg-green-500 hover:bg-green-600 rounded py-2 px-6 shadow text-white">Crear</a>
            </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-4">
                @foreach ($p as $item)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-2">
                    <div class="p-6">
                        <div class="text-gray-900">{{ $item->name }}</div>
                        <div class="text-gray-600">$ {{ $item->price }}</div>
                        <div class="text-gray-600 mb-4">{{ $item->tax * 100 }} %</div>
                        <div class="flex justify-end">
                        @if (!$admin)
                            <button class="bg-indigo-500 hover:bg-indigo-600 rounded py-2 px-6 shadow text-white">Comprar</button>
                        @else
                            <a href="#" class="bg-yellow-500 hover:bg-yellow-600 rounded py-2 px-6 shadow text-white mr-2">Editar</a>
                            <form action="{{ route('prod.delete',$item)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 rounded py-2 px-6 shadow text-white">Eliminar</button>
                            </form>
                        @endif
                        </div>                             
                    </div>
                </div>                
                @endforeach
            </div>
            <div class="flex justify-center mt-7">{{ $p->links() }}</div>              
        </div>
    </div>
</x-app-layout>