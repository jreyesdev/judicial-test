<form method="POST" action="{{ $ruta }}">
    @csrf
    <div>
        <x-label for="name" :value="__('Nombre producto')" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? ($prod ? $prod->name : '')" required autofocus />
    </div>
    <div class="mt-4">
        <x-label for="price" :value="__('Precio del producto ($)')" />
        <x-input id="price" class="block mt-1 w-full" type="numeric" name="price" :value="old('price') ?? ($prod ? $prod->price : '')" required placeholder="Ej.: 25.15" />
    </div>
    <div class="mt-4">
        <x-label for="tax" :value="__('Impuesto del producto (%)')" />
        <x-input id="tax" class="block mt-1 w-full" type="numeric" name="tax" :value="old('tax') ?? ($prod ? $prod->tax * 100 : '')" required placeholder="Ej.: 25.15" />
    </div>
    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-4">
            {{ __($button) }}
        </x-button>
    </div>
</form>
