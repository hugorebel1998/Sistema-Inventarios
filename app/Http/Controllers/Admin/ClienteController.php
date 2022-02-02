<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    public function __construct()
    {
        
        return $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Customer::all();
        return view('admin.clientes.index', compact('clientes'));
    }
    public function create()
    {
    
        return view('admin.clientes.create');
    }
    public function store(ClienteRequest $request)
    {
        $cliente = new Customer();
        $cliente->name =  $request->nombre;
        $cliente->apellidos =  $request->apellidos;
        $cliente->tipo_documento =  $request->tipo_documento;
        $cliente->direccion =  $request->dirección;
        $cliente->telefono =  $request->teléfono;
        $cliente->email =  $request->correo_electrónico;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/clientes/');
            $imagen->move($ruta, $nombreImagen);
            $cliente->imagen_cliente = $nombreImagen;
        }

    

        if ($cliente->save()) {
            toastr()->success('Nuevo cliente registrado');
            return redirect()->to(route('clientes.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $cliente = Customer::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));

    }

    public function update(Request $request)
    {
        $id = $request->cliente_id;
        $cliente = Customer::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'tipo_documento' => 'required',
            'dirección' => 'required',
            'teléfono' => 'min:10|max:10|required',
            'correo_electrónico' => 'required|email|unique:customers,email,'. $cliente->id
        ]);

        $cliente->name =  $request->nombre;
        $cliente->apellidos =  $request->apellidos;
        $cliente->tipo_documento =  $request->tipo_documento;
        $cliente->direccion =  $request->dirección;
        $cliente->telefono =  $request->teléfono;
        $cliente->email =  $request->correo_electrónico;


        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path('img/clientes/');
            $imagen->move($ruta, $nombreImagen);
            $cliente->imagen_cliente = $nombreImagen;
        }

        if ($cliente->save()) {
            toastr()->info('Cliente actualizado');
            return redirect()->to(route('clientes.index'));
        } else {
            toastr()->error('Algo salio mal');
            return redirect()->back();
        
        }

    }

    public function delete($id)
    {
        $cliente = Customer::findOrFail($id);
        if($cliente->delete()){
            return redirect()->back();
        }else{
            toastr()->error('Algo salio mal');
            return redirect()->back();
        }

    }
    public function indexDelete()
    {
        $clientes = Customer::onlyTrashed()->get();
        return view('admin.clientes.inDelete', compact('clientes'));   
    }

    public function restore($id)
    {
      Customer::onlyTrashed()->findOrFail($id)->restore();
      return redirect()->to(route('clientes.index'));

    }



}
