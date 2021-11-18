<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <x-label for="name" :value="__('Nombre producto')" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    </div>
    <div class="mt-4">
        <x-label for="price" :value="__('Precio del producto')" />
        <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required placeholder="Ej.: 25.15" />
    </div>
    <div class="mt-4">
        <x-label for="tax" :value="__('Impuesto del producto (%)')" />
        <x-input id="tax" class="block mt-1 w-full" type="number" name="tax" :value="old('tax')" required placeholder="Ej.: 25.15" />
    </div>
    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
            {{ __('Agregar') }}
        </x-button>
    </div>
</form>
