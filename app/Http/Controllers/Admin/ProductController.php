<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\UnidaMedida;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $productos = Product::all();
        $categorias = Category::where('status','Activo')->get();
        $unidades = UnidaMedida::where('status','Activo')->get();
        
        return view('admin.productos.index', compact('productos', 'categorias', 'unidades'));
    }

    public function create()
    {
        $categorias = Category::where('status', 'Activo')->get();
        // dd($categorias);
        $unidades = UnidaMedida::where('status', 'Activo')->get();
        return view('admin.productos.create', compact('categorias', 'unidades'));
    }

    public function store(ProductRequest $request)
    {
        $producto = new Product();
        $producto->name = $request->nombre;
        $producto->imagen_producto  = $request->imagen_producto;
        $producto->category_id = $request->categoria;
        $producto->unidad_id = $request->unidad;
        $producto->descripcion = $request->descripción;


        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/productos/');
            $imagen->move($ruta, $nombreImagen);
            $producto->imagen_producto = $nombreImagen;
        }


        if ($producto->save()) {
            toastr()->success('Nuevo producto registrado');
            return redirect()->to(route('productos.index'));
        } else {
            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {

       
        $producto = Product::findOrFail($id);
        $categorias = Category::where('status','Activo')->get();
        $unidades = UnidaMedida::where('status','Activo')->get();
        return view('admin.productos.edit', compact('producto','categorias', 'unidades'));
    }

    public function update(ProductRequest $request)
    {
        $id = $request->product_id;
        $producto = Product::findOrFail($id);
        $producto->status = $request->estatus;
        $producto->name = $request->nombre;
        $producto->category_id = $request->categoria;
        $producto->unidad_id = $request->unidad;
        $producto->descripcion = $request->descripción;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/productos/');
            $imagen->move($ruta, $nombreImagen);
            $producto->imagen_producto = $nombreImagen;
        }


        if ($producto->save()) {
            toastr()->info('Producto actualizado');
            return redirect()->to(route('productos.index'));
        } else {
            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $producto = Product::findOrFail($id);
        if ($producto->delete()) {
            return redirect()->back();
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function indexDelete()
    {
        $productos = Product::onlyTrashed()->get();
<<<<<<< HEAD
        return view('admin.productos.inDelete', compact('productos'));
=======
        $categorias = Category::all();
        $unidades = UnidaMedida::all();
        return view('admin.productos.inDelete', compact('productos', 'categorias', 'unidades'));   
>>>>>>> bddb414ecefcd94b83520a6046b04661dc1f20eb
    }

    public function restore($id)
    {
        Product::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->to(route('productos.index'));
    }
}
