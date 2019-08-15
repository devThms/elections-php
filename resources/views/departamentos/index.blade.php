@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
        <span class="pull-right"> <a href="{{ url('/departamentos/create') }}"> <button class="btn btn-rounded btn-outline-success"> <i class="fa fa-plus"></i> Crear</button> </a> </span>
    </div>
    <div class="card-body">
        <table id="tblDepartamentos" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->id }}</td>
                    <td> {{ $departamento->Nombre }} </td>
                    <td>
                        <form method="POST" action="/departamentos/delete/{{ $departamento->id }}">
                            {{ csrf_field() }}
                            <a href="{{ url('/departamentos/'.$departamento->id.'/edit') }} " class=" btn btn-outline-primary "> <i class="fa fa-pencil-square-o "></i> </a>
                            <button type="submit " class="btn btn-outline-danger "> <i class="fa fa-trash-o "></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection