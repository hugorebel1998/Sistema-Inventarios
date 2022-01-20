<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
