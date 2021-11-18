<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
        {{ __('Productos') }}
    </x-nav-link>
    @if (auth()->user()->rol[0]->name === 'administrador')
    <x-nav-link :href="route('facturas')" :active="request()->routeIs('facturas')">
        {{ __('Facturas') }}
    </x-nav-link>
    @endif
</div>
