<div>
    @section('content')
        
   
    
            <div class="card">
                @if ($asignacions->count())
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                    <th class="w-full text-center">Objetivo Operacional</th>
                                    <th class="w-full pr-6 text-left">Avance Real</th>
                                    <th class="w-full pr-6">Planificado</th>
                                    <th class="w-full pr-6">Desviación</th>
                                    <th class="w-full">Cumplimiento</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignacions as $asignacion)
                                    <tr class="py-2 border-collapse border border-gray-300">
                                        <td class="py-4 pr-4 pl-6">{{$asignacion->objoperacional->description}}</td>
                                        <td class="py-2 pl-4">{{round($asignacion->avance->avance_real,2) ?? '-'}} %</td>
                                        <td class="py-2 pl-8">{{round($asignacion->avance->avance_plan,2) ?? '-'}} %</td>
                                        <?php $desviacion = ($asignacion->avance->avance_plan) - ($asignacion->avance->avance_real);
                                        if( $desviacion >=1 && $desviacion <=9){
                                            $colord = 'orange';
                                        }else if($desviacion >=10) {
                                            $colord = 'red';
                                        }else if($desviacion <=1) {
                                            $colord = 'green';
                                        }
                                        ?>
                                        
                                        <td class="py-2 pl-8 font-bold" style ="color: {{$colord}}"> {{round(($asignacion->avance->avance_plan) - ($asignacion->avance->avance_real)),2}} % </td>
                                        <td class="py-2 pl-8">{{round((($asignacion->avance->avance_real) / ($asignacion->avance->avance_plan))*100),2}} %</td>
                                   
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                @else 
                    <div class="card-body">
                        <strong>No hay asignaciones</strong>
                    </div>
                @endif 
                      
            </div>
    @endsection
</div>