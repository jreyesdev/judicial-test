<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
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
    public function index()
    {
        $p = Product::paginate();
        $admin = auth()->user()->rol[0]->name === 'administrador';
        return view('products.index', compact('p', 'admin'));
    }

    /**
     * Vista para crear producto
     * @return View
     */
    public function nuevo()
    {
        $titulo = 'Crear nuevo producto';
        $ruta = route('prod.create');
        $button = 'Agregar';
        $prod = null;
        return view('products.nuevo', compact('titulo', 'ruta', 'button', 'prod'));
    }

    /**
     * POST para crear producto
     * @param CreateProductRequest $req
     * @return Redirect
     */
    public function add(CreateProductRequest $req)
    {
        $alert = Product::create($req->validated());
        $alert = $alert ? ['success', 'Producto creado.'] : ['danger', 'Error al crear producto.'];
        return redirect(route('products'))->withAlert($alert);
    }

    /**
     * Vista para editar producto
     * @param Request $req
     * @param Product $prod
     * @return View
     */
    public function editar(Request $req, Product $prod)
    {
        $titulo = 'Actualizar producto ' . $prod->name;
        $ruta = route('prod.edit', $prod);
        $button = 'Actualizar';
        return view('products.nuevo', compact('titulo', 'ruta', 'button', 'prod'));
    }

    /**
     * POST para crear producto
     * @param UpdateProductRequest $req
     * @return Redirect
     */
    public function update(UpdateProductRequest $req, Product $prod)
    {
        $alert = $req->validated();
        $prod->name = $alert['name'];
        $prod->price = $alert['price'];
        $prod->tax = $alert['tax'];
        $alert = $prod->save() ? ['success', 'Producto actualizado.'] : ['danger', 'Error al actualizar producto.'];
        return redirect(route('products'))->withAlert($alert);
    }

    /**
     * Elimina producto
     * @return Redirect
     */
    public function delete(Request $req, Product $prod)
    {
        $alert = $prod->delete() ? ['success', 'Producto eliminado'] : ['danger', 'Error al eliminar'];
        return redirect(route('products'))->withAlert($alert);
    }
}
