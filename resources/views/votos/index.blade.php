@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
        <span class="pull-right"> <a href="{{ url('/registros/create') }}"> <button class="btn btn-rounded btn-outline-success"> <i class="fa fa-plus"></i> Crear</button> </a> </span>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Mesa</th>
                    <th>Partido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($votos as $voto)
                <tr>
                    <td>{{ $voto->id }}</td>
                    <td>{{ $voto->departamento->Nombre }} </td>
                    <td>{{ $voto->municipio->Nombre }}</td>
                    <td>{{ $voto->Mesa }}</td>
                    <td>{{ $voto->Partido }}</td>
                    <td>
                        {!! Form::open(['route' => ['registros.destroy', $voto->id], 'method' => 'DELETE']) !!} {{ csrf_field() }}
                        <a href="{{ url('/registros/'.$voto->id.'/edit') }} " class=" btn btn-outline-primary "> <i class="fa fa-pencil-square-o "></i> </a>
                        <button type="submit" class="btn btn-outline-danger"> <i class="fa fa-trash-o"></i></button> {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Mesa</th>
                    <th>Partido</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>



@endsection