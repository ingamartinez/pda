@extends('layouts.newApp')

@section('menu')
    @include('partials.menu')
@endsection

@section('content')
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Inicio</a>
            </li>
            <li>
                <a href="{{url('goblue')}}">Listar Go Blue</a>
            </li>
        </ul>
    </div>

    @if (Session::has('mensaje'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Ohh! </strong>{{ Session::get('mensaje') }}
        </div>
    @endif

    @if (Session::has('mensajeExito'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Bien! </strong> {{ Session::get('mensajeExito') }}
        </div>
    @endif

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-star"></i> Listado de Go Blue</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
                            <thead>

                                <th> # </th>
                                <th> ID PDV </th>
                                <th> Nombre del punto </th>
                                <th> Circuito </th>
                                <th> Asesor Encargado</th>
                                <th> Supervisor </th>
                                <th> # Sim Activas </th>
                                <th> # Sim Sin Activar </th>
                                <th> Visitado </th>
                                <th> Ultima Visita </th>
                                <th> Foto Fachada </th>
                                <th>  </th>
                            </thead>
                            <tbody>
                            @foreach($dmss as $dms)
                                <tr data-id="{{$dms->id}}">
                                    <td>{{$dms->id}}</td>
                                    <td>{{$dms->idpdv}}</td>
                                    <td>{{$dms->nombre_punto}}</td>
                                    <td>{{$dms->circuito}}</td>
                                    <td>{{$dms->NOMBRE_ASESOR}}</td>
                                    <td>{{$dms->NOMBRE_SUPERVISOR}}</td>
                                    <td>{{$dms->cant_sim_activas}}</td>
                                    <td>{{$dms->cant_sim_sin_activar}}</td>
                                    <td>{{$dms->visitado}}</td>
                                    <td>{{$dms->ultimaVisita}}</td>
                                    <td><a target="_blank" href="{{asset('imagenes/'.$dms->ruta_imagen1)}}"><img width="90" src="{{asset('imagenes/min/'.$dms->ruta_imagen1)}}" class="img-responsive"></a></td>
                                    <td><a href="{{url('/dms/'.$dms->idpdv)}}" class="btn btn-success"> Ver </a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/row-->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "language": {
                    url: "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                filter: true,
                sort: true,
                info: true,
                autoWidth: true,
                order: [
                    [9, "desc"]
                ]
            });
        });
    </script>
@endpush