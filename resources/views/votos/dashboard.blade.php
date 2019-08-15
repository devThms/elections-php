@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
    </div>
    <div class="card-body">
        {!! Form::open(['action' => 'VotosController@getResults', 'class' => 'form-horizontal form-material']) !!} {{ csrf_field() }}

        <div class="row">
            <div class="col-md-4">
                <label for="" class="control-label"> <b>Departamento</b> </label>
                <select name="departamento" class="form-control">
                    <option value="">Seleccione Departamento ...</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{$departamento->id}}">{{$departamento->Nombre}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Select Anidado en función del primero -->
            <div class="col-md-4">
                <label for="" class="control-label"> <b>Municipio</b> </label>
                <select name="municipio" class="form-control">
                    <option value="">Seleccione Municipio ...</option>
                    @foreach ($municipios as $municipio)
                        <option value="{{$municipio->id}}">{{$municipio->Nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <br>
                <button type="submit" class="btn btn-outline-info"> <i class="fa fa-refresh"> </i> Refrescar</button>
            </div>
        </div>
        {!! Form::close() !!}
        <br>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Partido</th>
                    <th>Total de Votos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resultados as $resultado)
                <tr>
                    <td>{{ $resultado->departamento }}</td>
                    <td>{{ $resultado->municipio }} </td>
                    <td>{{ $resultado->partido }}</td>
                    <td>{{ $resultado->tvotos }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Partido</th>
                    <th>Total de Votos</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection