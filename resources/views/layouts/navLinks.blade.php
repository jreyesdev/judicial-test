<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
        {{ __('Productos') }}
    </x-nav-link>
    @if (auth()->user()->rol[0]->name === 'administrador')
    @endif
</div>
