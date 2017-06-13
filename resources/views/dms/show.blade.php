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
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="idpdv">ID PDV</label>
                                <input disabled type="text" class="form-control" id="idpdv" value="{{$dms->idpdv}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="cod_sub">Codigo Sub</label>
                                <input disabled type="text" class="form-control" id="cod_sub" value="{{$dms->COD_SUB}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre del Punto de Venta</label>
                                <input disabled type="text" class="form-control" id="nombre" value="{{$dms->nombre_punto}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="circuito">Circuito</label>
                                <input disabled type="text" class="form-control" id="circuito" value="{{$dms->circuito}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="vendedor">Vendedor</label>
                                <input disabled type="text" class="form-control" id="vendedor" value="{{$dms->NOMBRE_ASESOR}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="tipo_punto">Tipo de Punto</label>
                                <input disabled type="text" class="form-control" id="tipo_punto" value="{{$dms->TIPO_PUNTO}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="epin">Servicio EPIN</label>
                                <input disabled type="text" class="form-control" id="epin" value="{{$dms->SERV_EPIN}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="simcard">Servicio SIMCARD</label>
                                <input disabled type="text" class="form-control" id="simcard" value="{{$dms->SERV_SIMCARD}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="tigo_gestion">Servicio TIGO GESTION</label>
                                <input disabled type="text" class="form-control" id="tigo_gestion" value="{{$dms->SERV_MBOX}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="zona">Zona</label>
                                <input disabled type="text" class="form-control" id="zona" value="{{$dms->CIUDAD}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input disabled type="text" class="form-control" id="estado" value="{{$dms->ESTADO}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <a class="form-control btn btn-success" target="_blank" href="{{asset('imagenes/'.$dms->ruta_imagen1)}}" >> Ver Foto Fachada <</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/row-->

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-star"></i> Edición historico</h2>

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
                            <th> Nombre del Asesor </th>
                            <th> # SimCard Activas (Dejó en el Punto)</th>
                            <th> # SimCard sin Activar (Dejó en el Punto)</th>
                            <th> Fecha Visita </th>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                                <tr data-id="{{$log->id}}">
                                    <td>{{$log->id}}</td>
                                    <td>{{$log->user->nombre}}</td>
                                    <td>{{$log->repo_cant_sim_activas}}</td>
                                    <td>{{$log->repo_cant_sim_sin_activar}}</td>
                                    <td>{{$log->updated_at}}</td>
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
                    [4, "desc"]
                ]
            });
        });
    </script>
@endpush