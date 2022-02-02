<?php

namespace App\Exports;

use App\Collaborator;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CollaboratorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Collaborator::select('name','apellidos')->where('status', 'Activo')->get();
    // }
    public function view(): View
    {
        return view('export.empleados', [
            'empleados' => Collaborator::all()
        ]);
    }
}
