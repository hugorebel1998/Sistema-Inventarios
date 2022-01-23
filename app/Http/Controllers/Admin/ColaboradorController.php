<?php

namespace App\Http\Controllers\Admin;

use App\Collaborator;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColaboradorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ColaboradorController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $empleados = Collaborator::all();
        return view('admin.colaboradores.index', compact('empleados'));
    }

    public function create()
    {
        return view('admin.colaboradores.create');
    }


    public function store(ColaboradorRequest $request)
    {
        $empleado = new Collaborator();
        $empleado->status = $request->estatus;
        $empleado->name = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->tipo_documento = $request->tipo_documento;
        $empleado->telefono = $request->teléfono;
        $empleado->direccion = $request->dirección;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->email = $request->correo_electrónico;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/empleados/');
            $imagen->move($ruta, $nombreImagen);
            $empleado->imagen_colavorador = $nombreImagen;
        }

        // dd($empleado);
        if ($empleado->save()) {
            toastr()->success('Nuevo colaborador registrado');
            return redirect()->to(route('colaboradores.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $empleado = Collaborator::findOrFail($id);
        return view('admin.colaboradores.edit', compact('empleado'));
    }

    public function update(Request $request)
    {
        $id = $request->empleado_id;
        $empleado = Collaborator::findOrFail($id);

        $request->validate([
            'estatus' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'tipo_documento' => 'required',
            'teléfono' => 'min:10|max:10|required',
            'dirección' => 'required',
            'fecha_nacimiento' => 'required',
            'correo_electrónico' => 'required|email|unique:collaborators,email,' . $empleado->id
        ]);

        $empleado->status = $request->estatus;
        $empleado->name = $request->nombre;
        $empleado->apellidos = $request->apellidos;
        $empleado->tipo_documento = $request->tipo_documento;
        $empleado->telefono = $request->teléfono;
        $empleado->direccion = $request->dirección;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->email = $request->correo_electrónico;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/empleados/');
            $imagen->move($ruta, $nombreImagen);
            $empleado->imagen_colavorador = $nombreImagen;
        }

        // dd($empleado);

        if ($empleado->save()) {
            toastr()->info('Empleado actualizado');
            return redirect()->to(route('colaboradores.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $empleado = Collaborator::findOrFail($id);
        if($empleado->delete()){
            return redirect()->back();
        }else{
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function indexDelete()
    {
        $empleados = Collaborator::onlyTrashed()->get();
        return view('admin.colaboradores.inDelete', compact('empleados'));   
    }

    public function restore($id)
    {
      Collaborator::onlyTrashed()->findOrFail($id)->restore();
      return redirect()->to(route('colaboradores.index'));

    }
}
