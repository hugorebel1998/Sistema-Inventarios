<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProveedorRequest;
use Illuminate\Support\Str;
use App\Supplier;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $proveedores = Supplier::all();
        return view('admin.proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('admin.proveedores.create');
    }

    public function store(ProveedorRequest $request)
    {
        $proveedor = new Supplier();
        $proveedor->name = $request->nombre;
        $proveedor->apellidos = $request->apellidos;
        $proveedor->email = $request->correo_electrónico;
        $proveedor->telefono_1 = $request->telefono_1;
        $proveedor->telefono_2 = $request->telefono_2;
        $proveedor->calle = $request->calle;
        $proveedor->numero_int = $request->numero_int;
        $proveedor->numero_ext = $request->numero_ext;
        $proveedor->colonia = $request->colonia;
        $proveedor->municipio = $request->municipio;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/proveedores/');
            $imagen->move($ruta, $nombreImagen);
            $proveedor->imagen_proveedor = $nombreImagen;
        }

        if ($proveedor->save()) {
            toastr()->success('Nuevo proveedor registrado');
            return redirect()->to(route('proveedores.index'));
        } else {
            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $proveedor = Supplier::findOrFail($id);
        return view('admin.proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request)
    {
        $id = $request->proveedor_id;
        $proveedor = Supplier::find($id);

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo_electrónico' => 'required|email|unique:suppliers,email,' . $proveedor->id,
            'telefono_1' => 'required',
            'calle' => 'required',
            'numero_int' => 'required',
            'numero_ext' => 'required',
            'colonia' => 'required',
            'municipio' => 'required'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/proveedores/');
            $imagen->move($ruta, $nombreImagen);
            $proveedor->imagen_proveedor = $nombreImagen;
        }

        if ($proveedor->save()) {
            toastr()->info('Proveedor actualizado');
            return redirect()->to(route('proveedores.index'));
        } else {
            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $proveedor = Supplier::findOrFail($id);
        $proveedor->delete();
        // alert()->success('Éxito', 'Usuario eliminado.');
        return back();
    }
}
