<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
}
