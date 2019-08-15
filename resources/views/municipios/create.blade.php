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
                        {!! Form::open([ 'route' => 'municipios.store', 'method' => 'POST', 'class' => 'form-horizontal form-material']) !!} {{ csrf_field() }}
                        
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
                            {!! Form::label('nombre', 'Nombre') !!}
                            <div class="col-md-12">
                                {!! Form::text('nombre', null , ['class' => 'form-control form-control-line', 'name' => 'Nombre', 'placeholder' => 'Ej: Morales', 'required' => 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{ url('/municipios') }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"> </i> Regresar</a>
                                <button type="submit" class="btn btn-outline-success"> <i class="fa fa-save"> </i> Guardar</button>
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