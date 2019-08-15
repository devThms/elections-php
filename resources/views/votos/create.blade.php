@extends('layout.layout') @section('content')

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <b> {{ $title }} </b>
            </div>
            <div class="card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-6 col-md-12">
                        <img src="../../assets/images/Partidos/UNE.png" width="500px">
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6 col-md-12">
                        {!! Form::open([ 'route' => 'registros.store', 'method' => 'POST', 'class' => 'form-horizontal form-material']) !!} {{ csrf_field() }}
                        <div class="form-group">
                            {!! Form::label('departamento', 'Departamento') !!}
                            <div class="col-md-12">
                                <select name="departamento" class="form-control form-material" required>
                                    <option>Seleccione un departamento...</option>
                                    @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}" required> {{ $departamento->Nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('municipio', 'Municipio') !!}
                            <div class="col-md-12">
                                <select name="municipio" class="form-control form-material" required>
                                        <option>Seleccione un departamento...</option>
                                        @foreach($municipios as $municipio)
                                        <option value="{{$municipio->id}}" required> {{ $municipio->Nombre }} </option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('mesa', 'Mesa') !!}
                            <div class="col-md-12">
                                {!! Form::text('mesa', null , ['class' => 'form-control form-control-line', 'name' => 'Mesa', 'placeholder' => 'Ej: 18001', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <!-- Campo Partido Politico Oculto -->
                        {{ Form::hidden('Partido', 'UNE') }}

                        <div class="form-group">
                            {!! Form::label('validos', 'Votos Validos') !!}
                            <div class="col-md-12">
                                {!! Form::text('validos', null , ['class' => 'form-control form-control-line', 'name' => 'Validos', 'placeholder' => 'Ej: 20', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('nulos', 'Votos Nulos') !!}
                            <div class="col-md-12">
                                {!! Form::text('nulos', null , ['class' => 'form-control form-control-line', 'name' => 'Nulos', 'placeholder' => 'Ej: 20', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('impugnados', 'Votos Impugnados') !!}
                            <div class="col-md-12">
                                {!! Form::text('impugnados', null , ['class' => 'form-control form-control-line', 'name' => 'Impugnados', 'placeholder' => 'Ej: 20', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('blancos', 'Votos en Blanco') !!}
                            <div class="col-md-12">
                                {!! Form::text('blancos', null , ['class' => 'form-control form-control-line', 'name' => 'Blancos', 'placeholder' => 'Ej: 20', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{ url('/registros') }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"> </i> Regresar</a>
                                <button type="submit" class="btn btn-outline-success"> <i class="fa fa-arrow-right"> </i> Siguiente</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection