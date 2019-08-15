<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Voto;

use DB;

class VotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votos = Voto::get();
        return view('votos.index')
            ->with('votos', $votos)
            ->with('title', 'Registro de Votos');
    }


    // Vista Dashboard
    public function dashboard()
    {
        $departamentos = Departamento::get()
            ->where('Estado', 'Activo');
        
        $municipios = Municipio::get()
            ->where('Estado', 'Activo');

    
        $results = 
        DB::select('select 
                        d.Nombre AS departamento, 
                        m.Nombre AS municipio, 
                        v.Partido AS partido, 
                        SUM(v.VotosValidos) AS tvotos 
                    from votos AS v
                    inner join departamentos AS d ON d.id = v.departamento_id
                    inner join municipios AS m ON m.id = v.municipio_id
                    Group by
                        d.Nombre,
                        m.Nombre,
                        v.Partido
                    ');

        return view('votos.dashboard')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('resultados', $results)
            ->with('title', 'Resultados de Votacion');
    }


    public function getResults(Request $request)
    {
        $departamento = $request->input('departamento');
        $municipio = $request->input('municipio');

        if ($departamento && $municipio)
        {
            $results = 
            DB::select('select 
                            d.Nombre AS departamento, 
                            m.Nombre AS municipio, 
                            v.Partido AS partido, 
                            SUM(v.VotosValidos) AS tvotos 
                        from votos AS v
                        inner join departamentos AS d ON d.id = v.departamento_id
                        inner join municipios AS m ON m.id = v.municipio_id
                        where d.id = ? AND m.id = ?  
                        Group by
                            d.Nombre,
                            m.Nombre,
                            v.Partido
                        ', [$departamento, $municipio]);

        }

        if ($departamento && !$municipio)
        {
            $results = 
            DB::select('select 
                            d.Nombre AS departamento, 
                            m.Nombre AS municipio, 
                            v.Partido AS partido, 
                            SUM(v.VotosValidos) AS tvotos 
                        from votos AS v
                        inner join departamentos AS d ON d.id = v.departamento_id
                        inner join municipios AS m ON m.id = v.municipio_id
                        where d.id = ? 
                        Group by
                            d.Nombre,
                            m.Nombre,
                            v.Partido
                        ', [$departamento]);

        }

        if ($municipio && !$departamento)
        {
            $results = 
            DB::select('select 
                            d.Nombre AS departamento, 
                            m.Nombre AS municipio, 
                            v.Partido AS partido, 
                            SUM(v.VotosValidos) AS tvotos 
                        from votos AS v
                        inner join departamentos AS d ON d.id = v.departamento_id
                        inner join municipios AS m ON m.id = v.municipio_id
                        where m.id = ? 
                        Group by
                            d.Nombre,
                            m.Nombre,
                            v.Partido
                        ', [$municipio]);

        }
        
        if (!$departamento && !$municipio)
        {
            $results = 
            DB::select('select 
                            d.Nombre AS departamento, 
                            m.Nombre AS municipio, 
                            v.Partido AS partido, 
                            SUM(v.VotosValidos) AS tvotos 
                        from votos AS v
                        inner join departamentos AS d ON d.id = v.departamento_id
                        inner join municipios AS m ON m.id = v.municipio_id
                        Group by
                            d.Nombre,
                            m.Nombre,
                            v.Partido
                        ');

        }

        $departamentos = Departamento::get()
            ->where('Estado', 'Activo');
        
        $municipios = Municipio::get()
            ->where('Estado', 'Activo');

        return view('votos.dashboard')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('resultados', $results)
            ->with('title', 'Resultados de Votacion');
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
        
        $municipios = Municipio::get()
            ->where('Estado', 'Activo');

        return view('votos.create')
            ->with('departamentos', $departamentos)
            ->with('municipios', $municipios)
            ->with('title', 'Registro de Votos - Paso # 1 - Partido UNE');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voto = new Voto;

        $voto->departamento_id = $request->input('departamento');
        $voto->municipio_id = $request->input('municipio');
        $voto->Mesa = $request->input('Mesa');
        $voto->Partido = $request->input('Partido');
        $voto->VotosValidos = $request->input('Validos');
        $voto->VotosNulos = $request->input('Nulos');
        $voto->VotosImpugnados = $request->input('Impugnados');
        $voto->VotosBlancos = $request->input('Blancos');

        $voto->save();
 
        return view('votos.create2')
            ->with('departamento', $voto->departamento_id)
            ->with('municipio', $voto->municipio_id)
            ->with('mesa', $voto->Mesa)
            ->with('title', 'Registro de Votos - Paso # 2 - Partido VAMOS');
    }


    // Proceso de Registro Votos 2
    public function registro2(Request $request)
    {
        $voto = new Voto;

        $voto->departamento_id = $request->input('departamento');
        $voto->municipio_id = $request->input('municipio');
        $voto->Mesa = $request->input('Mesa');
        $voto->Partido = $request->input('Partido');
        $voto->VotosValidos = $request->input('Validos');
        $voto->VotosNulos = $request->input('Nulos');
        $voto->VotosImpugnados = $request->input('Impugnados');
        $voto->VotosBlancos = $request->input('Blancos');

        $voto->save();

        return redirect()->route('registros.index');
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
        $voto = Voto::find($id);

        return view('votos.edit')
            ->with('voto', $voto)
            ->with('title', 'Editar Registro de Voto');
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
        $voto = Voto::find($id);
        
        $voto->Mesa = $request->input('Mesa');
        $voto->Partido = $request->input('Partido');
        $voto->VotosValidos = $request->input('Validos');
        $voto->VotosNulos = $request->input('Nulos');
        $voto->VotosImpugnados = $request->input('Impugnados');
        $voto->VotosBlancos = $request->input('Blancos');

        $voto->save();

        return redirect()->route('registros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Voto::destroy($id);
        return redirect()->route('registros.index');
    }
}
