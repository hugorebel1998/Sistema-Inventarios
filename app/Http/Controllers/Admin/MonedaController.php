<?php

namespace App\Http\Controllers\Admin;

use App\Denomination;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MonedaController extends Controller
{
    
    public function __construct()
    {
        return $this->middleware('auth');
        
    }

    public function index()
    {
         $denominaciones = Denomination::all();
         return view('admin.denominaciones.index', compact('denominaciones'));
    }

    public function create()
    {

        
        return view('admin.denominaciones.create');
    }

    public function store(Request $request)    
    {

        $denominacion = new Denomination();
        $request->validate([
             'tipo' => 'required',
             'valor' => 'required'
        ]);

        $denominacion->tipo = $request->tipo;
        $denominacion->valor = $request->valor;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->tipo .'-'. $request->valor) . "." . $imagen->guessExtension();
            $ruta = public_path('img/denominaciones/');
            $imagen->move($ruta, $nombreImagen);
            $denominacion->imagen_denominacion = $nombreImagen;
        }
         

        if ( $denominacion->save()) {
            toastr()->success('Nuevo colaborador registrado');
            return redirect()->to(route('denominaciones.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $denominacion = Denomination::findOrFail($id);
        return view('admin.denominaciones.edit', compact('denominacion'));

    }
}
