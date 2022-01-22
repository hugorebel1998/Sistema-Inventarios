<?php

namespace App\Http\Controllers\Admin;

use App\Ajuste;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $generales = Ajuste::all();
        return view('admin.general.index', compact('generales'));
    }

    public function edit($id)
    {
        $general = Ajuste::findOrFail($id);
        return view('admin.general.edit', compact('general'));
    }

    public function update(Request $request)
    {
        $id = $request->general_id;
        $general = Ajuste::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
            'moneda' => 'required'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/ajustes/');
            $imagen->move($ruta, $nombreImagen);
            $general->logo = $nombreImagen;
        }

        $general->name = $request->nombre;
        $general->impuesto = $request->impuesto;
        $general->porcentaje_impuesto = $request->porcentaje_impuesto;
        $general->moneda = $request->moneda;

        if($general->save()){
            toastr()->info('Información actualizado');
            return redirect()->to(route('general.index'));
        }else{
            toastr()->error('Algo salio mal');
            return redirect()->back();

        }

    }
}
