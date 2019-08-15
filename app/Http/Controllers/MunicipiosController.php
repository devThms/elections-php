<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Models\Departamento;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipios = Municipio::get()->where('Estado', 'Activo');
        return view('municipios.index')
            ->with('municipios', $municipios)
            ->with('title', 'Mantenimiento Municipios');
    }


    public function obtenerMunicipios($id){
        return Municipio::get()->where('departamento_id', $id);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::get()
            ->where('Estado', 'Activo');

        return view('municipios.create')
            ->with('departamentos', $departamentos)
            ->with('title', 'Crear Municipio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $municipio = new Municipio;

        $municipio->Nombre = $request->input('Nombre');
        $municipio->departamento_id = $request->input('departamento');
        $municipio->Estado = 'Activo';

        $municipio->save();

        return redirect()->route('municipios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamentos = Departamento::get()
            ->where('Estado', 'Activo');

        $municipio = Municipio::find($id);

        return view('municipios.edit')
            ->with('departamentos', $departamentos)
            ->with('municipio', $municipio)
            ->with('title', 'Editar Municipio');
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
        $municipio = Municipio::find($id);

        $municipio->Nombre = $request->input('Nombre');
        $municipio->departamento_id = $request->input('departamento');

        $municipio->save();

        return redirect()->route('municipios.index');
    }

    public function updateState($id) 
    {
        $municipio = Municipio::find($id);

        $municipio->Estado = 'Inactivo';

        $municipio->save();

        return redirect()->route('municipios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
