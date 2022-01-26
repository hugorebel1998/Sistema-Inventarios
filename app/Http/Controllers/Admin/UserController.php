<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Http\Request;



class UserController extends Controller
{


    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(UserRequest $request)
    {
        $usuario = new User();
        $usuario->status = $request->estatus;
        $usuario->perfil = $request->perfil;
        $usuario->name = Str::title($request->nombre);
        $usuario->apellido_p = Str::title($request->apellido_paterno);
        $usuario->apellido_m = Str::title($request->apellido_materno);
        $usuario->telefono = $request->teléfono;
        $usuario->email = Str::lower($request->correo_electrónico);
        $usuario->password = $request->contraseña;
        $usuario->permiso = null;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/users/');
            $imagen->move($ruta, $nombreImagen);
            $usuario->imagen_usuario = $nombreImagen;
        }
        // dd($usuario);

        if ($usuario->save()) {
            toastr()->success('Nuevo usuario registrado');
            return redirect()->to(route('usuarios.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request)
    {
        $id = $request->user_id;
        $usuario = User::findOrFail($id);
        $request->validate([
            'estatus' => 'required',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'perfil' => 'required',
            'teléfono' => 'min:10|max:10|required',
            'correo_electrónico' => 'required|email|unique:users,email,' . $usuario->id,
        ]);

        $usuario->status = $request->estatus;
        $usuario->name =  Str::title($request->nombre);
        $usuario->apellido_p =  Str::title($request->apellido_paterno);
        $usuario->apellido_m =  Str::title($request->apellido_materno);
        $usuario->perfil = $request->perfil;
        $usuario->telefono = $request->teléfono;
        $usuario->email = Str::lower($request->correo_electrónico);


        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/users/');
            $imagen->move($ruta, $nombreImagen);
            $usuario->imagen_usuario = $nombreImagen;
        }

        if ($usuario->save()) {
            toastr()->info('Usuario actualizado');
            return redirect()->to(route('usuarios.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $usuario = User::findOrFail($id);
        if($usuario->delete()){
            return redirect()->back();
        }else{
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }

    }

    public function indexDelete()
    {
        $usuarios = User::onlyTrashed()->get();
        return view('admin.usuarios.inDelete', compact('usuarios'));   
    }

    public function restore($id)
    {
      User::onlyTrashed()->findOrFail($id)->restore();
      return redirect()->to(route('usuarios.index'));

    }

}
