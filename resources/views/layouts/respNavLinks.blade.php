<div class="pt-2 pb-3 space-y-1">
    <x-responsive-nav-link :href="route('products')" :active="request()->routeIs('products')">
        {{ __('Productos') }}
    </x-responsive-nav-link>
</div>
