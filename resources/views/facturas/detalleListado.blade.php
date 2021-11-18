<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                producto
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                cantidad
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                precio unit.
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                impuesto
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                subtotal
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @php
            $total = 0;
        @endphp
        @foreach ($cod as $item)
        @php
            $subtotal = $item->cant * $item->price * ($item->tax + 1);
            $subtotal = round($subtotal,2,PHP_ROUND_HALF_DOWN);
            $total += $subtotal;
        @endphp
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $item->nombre_producto }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="text-sm text-gray-500">{{ $item->cant }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="text-sm text-gray-500">$ {{ $item->price }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                <div class="text-sm text-gray-500">{{ $item->tax * 100 }} %</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-sm text-gray-900">$ {{ number_format($subtotal,2) }}</div>
            </td>
        </tr>
        @endforeach
        <hr>
        <tr>
            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-lg text-indigo-900 uppercase">Total:</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right">
                <div class="text-lg text-indigo-900">$ {{ number_format(round($total,2,PHP_ROUND_HALF_DOWN),2) }}</div>
            </td>
        </tr>
    </tbody>
</table>
