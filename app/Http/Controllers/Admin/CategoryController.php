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
        // dd($categorias);
        return view('admin.categorias.index', compact('categorias'));
    }
    public function create()
    {
        return view('admin.categorias.create');

    }

    public function store(CategoryRequest $request)
    {    
        // $fecha  =   Carbon::parse($request->fecha_de_compra)->formatLocalized('%A %d, %B %Y'); 
        $categoria = new Category();
        $categoria->name = $request->nombre;
        $categoria->slug = Str::slug($request->nombre);
        $categoria->fecha_compra = $request->fecha_de_compra;

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
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {

        $categoria = Category::findOrFail($id);
        $request->validate([
            'nombre' => 'required|unique:categories,name,' .$categoria->id,
            'fecha_de_compra' => 'required'
        ]);

        $categoria->name = $request->nombre;
        $categoria->status = $request->estatus;
        $categoria->fecha_compra = $request->fecha_de_compra;

      
        if ($categoria->save()) {
            toastr()->info('Categoria actualizada');
            return redirect()->to(route('categorias.index'));
        } else {
            toastr()->error('Algo salio mal!!!');
            return redirect()->back();
        }

    }
    public function delete($id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        return back();
    }

    public function indexDelete()
    {
        $categorias = Category::onlyTrashed()->get();
        return view('admin.categorias.inDelete', compact('categorias'));   
    }

    public function restore($id)
    {
    //   $proveedor = Supplier::findOrFail($id);
      Category::onlyTrashed()->findOrFail($id)->restore();
      return redirect()->to(route('categorias.index'));

    }


}
