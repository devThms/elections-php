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
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        {!! Form::model($voto, [ 'route' => ['registros.update', $voto], 'method' => 'PUT', 'class' => 'form-horizontal form-material']) !!}
                        
                        <div class="form-group">
                            {!! Form::label('departamento', 'Departamento') !!}
                            <div class="col-md-12">
                                {!! Form::text('departamento', $voto->departamento->Nombre , ['class' => 'form-control form-control-line', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('municipio', 'Municipio') !!}
                            <div class="col-md-12">
                                {!! Form::text('municipio', $voto->municipio->Nombre , ['class' => 'form-control form-control-line', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('mesa', 'Mesa') !!}
                            <div class="col-md-12">
                                {!! Form::text('mesa', $voto->Mesa , ['class' => 'form-control form-control-line', 'name' => 'Mesa', 'readonly']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('partido', 'Partido') !!}
                            <div class="col-md-12">
                                {!! Form::text('partido', $voto->Partido , ['class' => 'form-control form-control-line', 'name' => 'Partido', 'readonly']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('validos', 'Votos Validos') !!}
                            <div class="col-md-12">
                                {!! Form::text('validos', $voto->VotosValidos , ['class' => 'form-control form-control-line', 'name' => 'Validos', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('nulos', 'Votos Nulos') !!}
                            <div class="col-md-12">
                                {!! Form::text('nulos', $voto->VotosNulos , ['class' => 'form-control form-control-line', 'name' => 'Nulos', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('impugnados', 'Votos Impugnados') !!}
                            <div class="col-md-12">
                                {!! Form::text('impugnados', $voto->VotosImpugnados , ['class' => 'form-control form-control-line', 'name' => 'Impugnados', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('blancos', 'Votos en Blanco') !!}
                            <div class="col-md-12">
                                {!! Form::text('blancos', $voto->VotosBlancos , ['class' => 'form-control form-control-line', 'name' => 'Blancos', 'placeholder' => 'Ej: 20', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{ url('/registros') }}" class="btn btn-outline-info"> <i class="fa fa-arrow-left"> </i> Regresar</a>
                                <button type="submit" class="btn btn-outline-success"> <i class="fa fa-save"> </i> Guardar Cambios</button>
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