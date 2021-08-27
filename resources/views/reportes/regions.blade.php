@extends('layouts.inicio2')

@section('title', 'Sisconf')

@section('content_header')
    <h1 class="text-lg text-white-700">Reporte por región</h1>
@stop

@section('content')

            <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>

            <div class="card">
                @if ($divisions->count())
                    <div class="card-body">
                        <table class="table table-striped w-full">
                            <thead>
                                <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                    <th>Avance Real</th>
                                    <th>Planificado</th>
                                    <th >Desviación</th>
                                    <th >Cumplimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($desviacion_r == 1)
                                    <div class="card-body">
                                        <strong>La región seleccionada no tiene asignaciones registradas</strong>
                                    </div>
                                @else
                                    <tr class="py-2 border-collapse border border-gray-300">
                                        <td class="py-2 text-center">{{round($real_total_r,2) ?? '-'}} %</td>
                                        <td class="py-2 text-center">{{round($plan_total_r,2) ?? '-'}} %</td>
                                        <?php 
                                            if ($desviacion_r <=1) {
                                                $colord = 'green';
                                            }
                                            elseif($desviacion_r >=2 || $desviacion_r <=10){
                                                $colord = 'orange';
                                            }
                                            else {
                                                $colord = 'red';
                                            }
                                        ?>
                                        <td class="text-center font-bold" style ="color: {{$colord}}"> {{round($desviacion_r),2}} % </td>
                                        <td class="text-center">{{round($cumplimiento_r),2}} %</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="py-6">
                        <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR DIVISIÓN</p>
                        @if ($reportegeneral == '1')
                            <div class="card-body">
                                <strong>La región seleccionada no tiene asignaciones registradas</strong>
                            </div>
                         @else
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped w-full">
                                        <thead>
                                            <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                                <th>División</th>
                                                <th>Avance Real</th>
                                                <th>Planificado</th>
                                                <th >Desviación</th>
                                                <th >Cumplimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($divisions as $division)
                                                <tr class="py-2 border-collapse border border-gray-300">
                                                    <td class="py-2 text-center">{{$division->name}}</td>
                                                    <td class="text-center">{{round($division->reportedivision->real,2) ?? '-'}} %</td>
                                                    <td class="text-center">{{round($division->reportedivision->plan,2) ?? '-'}} %</td>
                                                    <?php 
                                                        if($division->reportedivision->plan == '0'){
                                                            $desviacion_d = 0;
                                                            $cumplimiento_d = 0;
                                                        }
                                                        else{
                                                            $desviacion_d = ($division->reportedivision->plan) - ($division->reportedivision->real);
                                                            $cumplimiento_d = (($division->reportedivision->real) / ($division->reportedivision->plan)) * 100;
                                                            if ($desviacion_d <=1) {
                                                                $colord_d = 'green';
                                                            }
                                                            elseif($desviacion_d >=2 || $desviacion_d <=10){
                                                                $colord_d = 'orange';
                                                            }
                                                            else {
                                                                $colord_d = 'red';
                                                            }
                                                        }
                                                    ?>
                                                    <td class="text-center font-bold" style ="color: {{$colord_d}}">{{round($desviacion_d,2) ?? '-'}} %</td>
                                                    <td class="text-center">{{round($cumplimiento_d,2) ?? '-'}} %</td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="flex py-4">

                                <div class="px-4">
                                    <a href="{{route('listado.region')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text">Regresar</a>
                                </div>

                                <div class="px-4">
                                    <a href="{{url('consultas_regiones/export-excel')}}" class="text-gray-600 text-lg font-bold hover:text-red-600 text-right">Exportar a excel</a>
                                </div>

                            </div>


                        @endif
                    </div>
                @else
                    <div class="px-6 py-4">
                        No hay divisiones registradas con la región seleccionada
                    </div>
                @endif
            </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop