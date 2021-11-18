<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Http\Request;
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
        $facts = Factura::orderBy('created_at', 'desc')->paginate();
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
     * Retorna codigo de la factura
     * @return string
     */
    protected function generaCodigo()
    {
        return now()->format('ymd-') . (Factura::count() + 1);
    }
}
