<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Vista de los productos
     * @return View
     */
    public function index(){
        $p = Product::paginate();
        $admin = auth()->user()->rol[0]->name === 'administrador';
        return view('products.index',compact('p','admin'));
    }

    /**
     * Elimina producto
     * @return Redirect
     */
    public function delete(Request $req, Product $prod){
        $alert = $prod->delete() ? ['success','Producto eliminado'] : ['danger','Error al eliminar'];
        return redirect(route('products'))->withAlert($alert);
    }
}
