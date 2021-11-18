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
     * Retorna codigo de la factura
     * @return string
     */
    protected function generaCodigo()
    {
        return now()->format('ymd-') . (Factura::count() + 1);
    }
}
