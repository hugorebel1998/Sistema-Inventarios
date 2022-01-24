<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UnidaMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        $unidades = UnidaMedida::all();
        return view('admin.unidad_medida.index', compact('unidades'));
    }

    public function create()
    {
        return view('admin.unidad_medida.create');
    }
    public function store(Request $request)
    {
        $unidad = new UnidaMedida();
        $request->validate([
            'nombre' => 'required',
            'prefijo' => 'required'
        ]);

        $unidad->name = $request->nombre;
        $unidad->prefijo = $request->prefijo;

        if ($unidad->save()) {
            toastr()->success('Nueva unidad de medida registrada');
            return redirect()->to(route('unidades.index'));
        } else {
            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $unidad = UnidaMedida::findOrFail($id);
        return view('admin.unidad_medida.edit', compact('unidad'));
    }

    public function update(Request $request)
    {
        $id = $request->unidad_id;
        $unidad = UnidaMedida::findOrFail($id);

        $request->validate([
            'estatus' => 'required',
            'nombre' => 'required',
            'prefijo' => 'required'
        ]);
        $unidad->status = $request->estatus;
        $unidad->name = $request->nombre;
        $unidad->prefijo = $request->prefijo;

        if ($unidad->save()) {
            toastr()->info('Unidad de medida actualizada');
            return redirect()->to(route('unidades.index'));
        } else {
            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $unidad = UnidaMedida::findOrFail($id);

    }
}
