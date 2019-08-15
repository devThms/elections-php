<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index() 
    {
        $departamentos = Departamento::get()->where('Estado', 'Activo');
        return view('departamentos.index')
                ->with('departamentos', $departamentos)
                ->with('title', 'Mantenimiento Departamentos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create')
            ->with('title', 'Crear Departamento');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new Departamento;

        $departamento->Nombre = $request->input('Nombre');
        $departamento->Estado = 'Activo';

        $departamento->save();

        return redirect()->route('departamentos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);
        return view('departamentos.edit')
            ->with('departamento', $departamento)
            ->with('title', 'Editar Departamento');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departamento = Departamento::find($id);

        $departamento->Nombre = $request->input('Nombre');

        $departamento->save();

        return redirect()->route('departamentos.index');
    }

    public function updateState($id) 
    {
        $departamento = Departamento::find($id);

        $departamento->Estado = 'Inactivo';

        $departamento->save();

        return redirect()->route('departamentos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departamento::destroy($id);

        return redirect()->route('departamentos.index');

    }

}
