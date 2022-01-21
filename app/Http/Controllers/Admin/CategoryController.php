<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct()
    {
        return $this->middleware('auth');
        
    }

    public function index()
    {
        $categorias = Category::all();
        return view('admin.categorias.index', compact('categorias'));
    }
    public function create()
    {
        $usuarios = User::where('status' ,'Activo')->get();
        $proveedores = Supplier::select('id', 'name')->get();
        return view('admin.categorias.create', compact('usuarios', 'proveedores'));
    }

    public function store(CategoryRequest $request)
    {    
        $fecha  =   Carbon::parse($request->fecha_de_compra)->formatLocalized('%A %d, %B %Y'); 
        $categoria = new Category();
        $categoria->name = $request->nombre;
        $categoria->slug = Str::slug($request->nombre);
        $categoria->fecha_compra = $fecha;
        $categoria->user_id = $request->usuario;
        $categoria->proveedor_id = $request->proveedor;

        //  dd($categoria);
        if ($categoria->save()) {
            toastr()->success('Nueva categoria registrada');
            return redirect()->to(route('categorias.index'));
        } else {

            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }
   

    }

    public function edit($id)
    {
        $categoria = Category::findOrFail($id);
        $usuarios = User::where('status' ,'Activo')->get();
        $proveedores = Supplier::select('id', 'name', 'apellidos')->get();
        return view('admin.categorias.edit', compact('categoria', 'usuarios', 'proveedores'));
    }

    public function update(Request $request, $id)
    {

        $categoria = Category::findOrFail($id);
        $id_user = $request->user_id;
        $user = User::findOrFail($id_user);
        $id_prove = $request->proveedor_id;
        $prove = Supplier::findOrFail($id_prove);

        $request->validate([
            'name' => 'required|unique:categories,name,' .$categoria->id,
            // 'usuario' => 'required',
            // 'proveedor' => 'required'
        ]);

        $categoria->name = $request->nombre;
        $categoria->user_id = $user;
        $categoria->proveedor_id = $prove;


        dd($categoria);

    }



}
