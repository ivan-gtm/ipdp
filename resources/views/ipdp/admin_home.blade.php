@extends('layouts.admin')
@section('title', 'Gestión de CEDULAS | Análisis')
@section('modulo_titulo', 'HOME')

@section('content')
@if( Auth::user()->rol == 'administracion')
    <div class="row">
        <div class="col-lg-4">
            <canvas id="ced-chart"></canvas>
        </div>
        <div class="col-lg-6">
            <div class="card" id="ticketsList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Resumen de C&eacute;dulas</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                            <thead>
                                <tr>
                                    <th>Cantidad de registros</th>
                                    <th>Tipo de registro</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" id="ticket-list-data">
                                @php
                                $totalC=0;
                                $stackCed = array();
                                @endphp                                
                                @foreach ($info_cedula as $cedula)
                                <tr>
                                    <td>
                                        {{ $cedula->cuenta }}
                                        @php
                                        //array_push($stackCed,$cedula->cuenta);
                                        $stackCed[] = $cedula->cuenta;
                                        @endphp
                                    </td>
                                    <td>
                                    @if( $cedula->origen == 'publica' )
                                    Pública
                                    @elseif( $cedula->origen == 'interna' )
                                    Interna
                                    @endif
                                    </td>
                                </tr>
                                @php
                                $totalC=$totalC+$cedula->cuenta
                                @endphp                                
                                @endforeach
                                <tr>
                                    <td>
                                        {{ $totalC}}

                                    </td>
                                    <td>
                                        TOTAL
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-lg-4">
            <canvas id="cedsit-chart"></canvas>
        </div>        
        <div class="col-lg-6">
            <div class="card" id="ticketsList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Resumen de situaci&oacute;n de las C&eacute;dulas</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                            <thead>
                                <tr>
                                    <th>Cantidad de registros</th>
                                    <th>Situación de las Cédulas</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" id="ticket-list-data">
                                @php
                                $totalSC=0;
                                $stackSitCed = array();
                                @endphp

                                @foreach ($cuenta_cedula as $cedula_estado)
                                <tr>
                                    <td>
                                        {{ $cedula_estado->cuenta }}
                                        @php
                                        array_push($stackSitCed,$cedula_estado->cuenta);
                                        @endphp
                                    </td>
                                    <td>
                                    @if( $cedula_estado->status == 1 )
                                    En análisis
                                    @elseif( $cedula_estado->status == 2 )
                                    En revisión técnica
                                    @elseif( $cedula_estado->status == 3 )
                                    En revisión jurídica
                                    @elseif( $cedula_estado->status == 4 )
                                    Integrada
                                    @elseif( $cedula_estado->status == 5 )
                                    Anexo de participación
                                    @elseif( $cedula_estado->status == 101 )
                                    Rechazada en análisis
                                    @elseif( $cedula_estado->status == 102 )
                                    Rechazada en revisión
                                    @endif
                                        
                                    </td>
                                </tr>
                                @php
                                $totalSC=$totalSC+$cedula_estado->cuenta
                                @endphp

                                @endforeach
                                <tr>
                                    <td>
                                        {{ $totalSC}}

                                    </td>
                                    <td>
                                        TOTAL
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-lg-4">
            <canvas id="frm-chart"></canvas>
        </div>        
        <div class="col-lg-6">
            <div class="card" id="ticketsList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Resumen de situaci&oacute;n de los Formatos Internos</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                            <thead>
                                <tr>
                                    <th>Cantidad de registros</th>
                                    <th>Situación <br>de los Formatos Internos</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" id="ticket-list-data">
                                @php
                                $totalFI=0;
                                $stackFI = array();
                                @endphp

                                @foreach ($info_formato as $formato_estado)
                                <tr>
                                    <td>
                                        {{ $formato_estado->cuenta }}
                                        @php
                                        array_push($stackFI,$formato_estado->cuenta);
                                        @endphp
                                    </td>
                                    <td>
                                    @if( $formato_estado->status == 1 )
                                    En análisis
                                    @elseif( $formato_estado->status == 2 )
                                    En revisión técnica
                                    @elseif( $formato_estado->status == 3 )
                                    En revisión jurídica
                                    @elseif( $formato_estado->status == 4 )
                                    Integrada
                                    @elseif( $formato_estado->status == 5 )
                                    Anexo de participación
                                    @elseif( $formato_estado->status == 101 )
                                    Rechazada en análisis
                                    @elseif( $formato_estado->status == 102 )
                                    Rechazada en revisión
                                    @endif
                                        
                                    </td>
                                </tr>
                                @php
                                $totalFI=$totalFI+$formato_estado->cuenta
                                @endphp
                                @endforeach
                                <tr>
                                    <td>
                                        {{ $totalFI}}

                                    </td>
                                    <td>
                                        TOTAL
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@else
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>            
@endif

@endsection

@section('js')
@if( Auth::user()->rol == 'administracion')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>
    <script type="text/javascript">

        const cedData = [{
            data: {{json_encode( $stackCed)}},
            backgroundColor: ['#efae54','#ef6771'],
            borderColor: "#fff"
            }];

        const cedSitData = [{
            data: {{json_encode( $stackSitCed)}},
            backgroundColor: ['#fa2e59','#ff703f','#f7bc05','#d6d578','#76bcad','#536c8d'],
            borderColor: "#fff"
            }];

        const frmData = [{
            data: {{json_encode( $stackFI)}},
            backgroundColor: ['#fa2e59','#ff703f','#f7bc05','#d6d578','#76bcad','#536c8d'],
            borderColor: "#fff"
            }];

        const cedOptions = {
            tooltips: {
                enabled: false
            },
            plugins: {
                datalabels: {
                formatter: (value, ctx) => {
                    const datapoints = ctx.chart.data.datasets[0].data
                    const total = datapoints.reduce((total, datapoint) => total + datapoint, 0)
                    const percentage = value / total * 100
                    return percentage.toFixed(2) + "%";
                },
                color: '#fff',
                }
            }
        };
        var cedCtx = document.getElementById("ced-chart").getContext('2d');
        var cedSitCtx = document.getElementById("cedsit-chart").getContext('2d');
        var frmCtx = document.getElementById("frm-chart").getContext('2d');

        var cedChart = new Chart(cedCtx, {
            type: 'pie',
            data: {
            labels: ['Interna','Pública'],
                datasets: cedData
            },
            options: cedOptions,
            plugins: [ChartDataLabels],
        });
        var cedSitChart = new Chart(cedSitCtx, {
            type: 'pie',
            data: {
            labels: ['En análisis','En revisión técnica','En revisión jurídica','Integrada','Anexo de participación','Rechazada en análisis'],
                datasets: cedSitData
            },
            options: cedOptions,
            plugins: [ChartDataLabels],
        });
        var frmChart = new Chart(frmCtx, {
            type: 'pie',
            data: {
            labels: ['En análisis','En revisión técnica','En revisión jurídica','Integrada','Anexo de participación','Rechazada en análisis'],
                datasets: frmData
            },
            options: cedOptions,
            plugins: [ChartDataLabels],
        });
    </script>
@endif
@endsection