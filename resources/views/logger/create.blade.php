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
                <a href="{{url('ventas/create')}}">Registrar Venta</a>
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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="#" id="formRegistrarVentas" role="form" data-toggle="validator" autocomplete="off" enctype="multipart/form-data">

        {{method_field('PUT')}}

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Validar IDPDV para Registro de visita</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">


                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="idpdv">ID PDV</label>
                                    <input type="number" class="form-control" id="idpdv" name="idpdv" placeholder="Ingrese ID PDV" value="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                    <button type="button" style="margin-top: 5px;" class="btn btn-primary center-block"
                                            id="validate">Validar ID PDV
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="cod_sub">Codigo Sub</label>
                                    <input disabled type="text" class="form-control" id="cod_sub">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Punto de Venta</label>
                                    <input disabled type="text" class="form-control" id="nombre">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="circuito">Circuito</label>
                                    <input disabled type="text" class="form-control" id="circuito">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="vendedor">Vendedor</label>
                                    <input disabled type="text" class="form-control" id="vendedor">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="tipo_punto">Tipo de Punto</label>
                                    <input disabled type="text" class="form-control" id="tipo_punto">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="epin">Servicio EPIN</label>
                                    <input disabled type="text" class="form-control" id="epin">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="simcard">Servicio SIMCARD</label>
                                    <input disabled type="text" class="form-control" id="simcard">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="tigo_gestion">Servicio TIGO GESTION</label>
                                    <input disabled type="text" class="form-control" id="tigo_gestion">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="zona">Zona</label>
                                    <input disabled type="text" class="form-control" id="zona">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input disabled type="text" class="form-control" id="estado">
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
                        <h2><i class="glyphicon glyphicon-star"></i> Preguntas al Punto de Venta - Parte 1</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="sim_sin_activar_actuales">Simcards SIN ACTIVAR (actuales)</label>
                                    <input type="number" class="form-control" id="sim_sin_activar_actuales" name="sim_sin_activar_actuales" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="sim_activas_actuales">Simcards ACTIVADAS (actuales)</label>
                                    <input type="number" class="form-control" id="sim_activas_actuales" name="sim_activas_actuales" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="producto_vendido">Esta el Punto Agotado?</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="agotado" id="agotado_si" value="S" required>
                                            Si
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="agotado" id="agotado_no" value="N" required>
                                            No
                                        </label>
                                    </div>

                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row hidden" id="div_agotado">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="sim_sin_activar_nuevas">Simcards SIN ACTIVAR (nuevas)</label>
                                    <input type="number" class="form-control" id="sim_sin_activar_nuevas" name="sim_sin_activar_nuevas" placeholder="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="sim_activas_nuevas">Simcards ACTIVADAS (nuevas)</label>
                                    <input type="number" class="form-control" id="sim_activas_nuevas" name="sim_activas_nuevas" placeholder="">
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

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
                        <h2><i class="glyphicon glyphicon-star"></i> Preguntas al Punto de Venta - Parte 2</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="img_fachada">Foto #1 Fachada</label>
                                    <input id="img_fachada" name="img_fachada" accept="image/*" type="file" capture="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" form="formRegistrarVentas" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div><!--/row-->

    </form>

    <!-- content ends -->
@endsection

@push('script')
<script>

    $(document).ready(function () {
    });

    $('#validate').on('click', function (e) {
        e.preventDefault();
        var idpdv = $('#idpdv').val();
        validarDMS(idpdv);

    });
    function validarDMS(idpdv) {
        $.ajax({
            type: 'GET',
            url: '{{url('dms')}}/' + idpdv,
            success: function (data) {

                $('#cod_sub').val(data.COD_SUB);
                $('#nombre').val(data.nombre_punto);
                $('#circuito').val(data.circuito);
                $('#vendedor').val(data.NOMBRE_ASESOR);
                $('#tipo_punto').val(data.TIPO_PUNTO);
                $('#epin').val(data.SERV_EPIN);
                $('#simcard').val(data.SERV_SIMCARD);
                $('#tigo_gestion').val(data.SERV_MBOX);
                $('#zona').val(data.CIUDAD);
                $('#estado').val(data.ESTADO);

                $('#sim_sin_activar_actuales').val(data.cant_sim_sin_activar);
                $('#sim_activas_actuales').val(data.cant_sim_activas);

                $('#formRegistrarVentas').attr('action','{{url('dms')}}/'+idpdv);
            },
            error: function (qXHR, textStatus, errorThrown) {
//                    console.reportes(qXHR.status,textStatus,errorThrown);
                limpiarPuntoDeVenta();
                $('#formRegistrarVentas').attr('action','#');
                swal(
                    'IDPDV no Encontrado',
                    'Por favor validar si el IDPDV fue ingresado correctamente',
                    'error'
                )
            }
        });
    }
    function limpiarPuntoDeVenta() {
        var form = $('#formRegistrarVentas');
        $('#idpdv').val('');
        $('#cod_sub').val('');
        $('#nombre').val('');
        $('#circuito').val('');
        $('#vendedor').val('');
        $('#tipo_punto').val('');
        $('#epin').val('');
        $('#simcard').val('');
        $('#tigo_gestion').val('');
        $('#zona').val('');
        $('#estado').val('');

        $('#sim_sin_activar_actuales').val('');
        $('#sim_activas_actuales').val('');

        form.validator("validate");
    }

    $("input[type='radio'][name='agotado']").on('click',function () {
        var form = $('#formRegistrarVentas');
        var val=$(this).val();

        if (val === 'S'){
            $("#div_agotado").removeClass('hidden');
            $("#sim_sin_activar_nuevas").attr("required", true);
            $("#sim_activas_nuevas").attr("required", true);
        }else if (val === 'N'){
            $("#div_agotado").addClass('hidden');
            $("#sim_sin_activar_nuevas").attr("required", false);
            $("#sim_activas_nuevas").attr("required", false);

            form.validator("validate");
        }
    });

    {{--$('#formRegistrarVentas').on('submit',function (e) {--}}
        {{--e.preventDefault();--}}
        {{--var idpdv = $('#idpdv').val();--}}

        {{--$.ajax({--}}
            {{--type: 'PUT',--}}
            {{--url: '{{url('dms')}}/' + idpdv,--}}
            {{--data: $(this).serialize(),--}}
            {{--success: function (data) {--}}
                {{--swal(--}}
                    {{--'Bien',--}}
                    {{--'Se ha registrado correctamente',--}}
                    {{--'success'--}}
                {{--).then(function () {--}}
                    {{--location.reload();--}}
                {{--});--}}
            {{--},--}}
            {{--error: function (qXHR, textStatus, errorThrown) {--}}
{{--//                    console.reportes(qXHR.status,textStatus,errorThrown);--}}
                {{--swal(--}}
                    {{--'Ohh',--}}
                    {{--'No se ha podido registrar la visita',--}}
                    {{--'error'--}}
                {{--).then(function () {--}}
                    {{--location.reload();--}}
                {{--});--}}
            {{--}--}}
        {{--});--}}

    {{--});--}}




</script>
@endpush