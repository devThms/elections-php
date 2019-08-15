@extends('layout.layout') @section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <b> {{ $title }} </b>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    <td>
                        <button class="btn btn-outline-primary"> <i class="fa fa-pencil-square-o"></i></button>
                        <button class="btn btn-outline-danger"> <i class="fa fa-trash-o"></i></button>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection