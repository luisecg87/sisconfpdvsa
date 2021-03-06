@extends('adminlte::page')

@section('title', 'Sisconf')


@section('content_header')
    <h1 class="text-lg text-gray-700">Registro de división</h1>
@stop

@section('content')
@if (session('info'))
        <div class="p-3 mb-2 bg-success text-white">División creada correctamente</div>
@endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.divisions.store']) !!}
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Ingrese el nombre de la división']) !!}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('region_id', 'Región:') !!}
                    {!! Form::select('region_id', $regions, null, ['class' => 'form-control']) !!}
                    @error('region_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                {!! Form::submit('Crear división', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop