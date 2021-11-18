<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FacturaController extends Controller
{
    /**
     * Vista de facturas generadas
     * @return View
     */
    public function index()
    {
        $comp = Compra::count();
        $facts = Factura::select(['codigo', 'user_id', 'created_at'])
            ->addSelect(DB::raw('sum(cant * (price * (tax + 1))) as total'))
            ->groupBy('codigo')->groupBy('user_id')->groupBy('created_at')
            ->orderBy('created_at', 'desc')->paginate();
        return view('facturas.index', compact('facts', 'comp'));
    }

    /**
     * Detalle de factura
     * @return View
     */
    public function show(Request $req, string $cod)
    {
        $cod = Factura::whereCodigo($cod)
            ->orderBy('created_at', 'desc')->get();

        if (!count($cod)) abort(404);

        return view('facturas.detalle', compact('cod'));
    }

    /**
     * Genera las facturas
     *
     */
    public function generar()
    {
        // Agrupa por cliente
        $facts = Compra::select(['product_id', 'user_id'])
            ->addSelect(DB::raw('count(product_id) as count_prod'))
            ->groupBy('user_id')->groupBy('product_id')
            ->get()->groupBy(function ($item) {
                return $item->user_id;
            });
        // Inserta en Facturas
        $facts->map(function ($items, $clientId) {
            $cod = $this->generaCodigo();
            $items->map(function ($prod) use ($cod) {
                Factura::create([
                    'codigo' => $cod,
                    'nombre_producto' => $prod->product->name,
                    'cant' => $prod->count_prod,
                    'price' => $prod->product->price,
                    'tax' => $prod->product->tax,
                    'user_id' => $prod->user_id,
                ]);
            });
            Compra::whereUserId($clientId)->delete();
        });
        return redirect(route('facturas'))
            ->withAlert(['success', 'Facturas generadas']);
        /*
        [
            'codigo',
            'nombre_producto',
            'cant',
            'price',
            'tax',
            'user_id',
        ]

        $facts = Compra::toBase()->get()
            ->groupBy(function ($item) {
                return $item->user_id;
            });
        $facts = Compra::select(['product_id', 'user_id'])
            ->addSelect(DB::raw('count(product_id) as count'))
            ->groupBy('product_id')->groupBy('user_id')
            ->get();
        */
    }

    /**
     * Retorna codigo de la factura
     * @return string
     */
    protected function generaCodigo()
    {
        $cant = Factura::select(['codigo'])->groupBy('codigo')
            ->get()->count() + 1;
        return now()->format('ymd-') . $cant;
    }
}
