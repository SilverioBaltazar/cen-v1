@extends('sicinar.principal')

@section('title','Editar producto de factura de venta')

@section('links')
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('nombre')
    {{$nombre}}
@endsection

@section('usuario')
    {{$usuario}}
@endsection

@section('content')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Menú
                <small>Ventas - Facturar productos - productos - Editar</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        {!! Form::open(['route' => ['actualizarfactProducto', $regfacturaprod->periodo_id,$regfacturaprod->factura_folio,$regfacturaprod->dfactura_npartida], 'method' => 'PUT', 'id' => 'actualizarfactProducto', 'enctype' => 'multipart/form-data']) !!}
                        <div class="box-body">

                            <table id="tabla1" class="table table-hover table-striped">
                            @foreach($regfactura as $factura)                                               
                            <tr>                            
                                <td style="text-align:left; vertical-align: middle;"> 
                                    <input type="hidden" id="periodo_id"    name="periodo_id"    value="{{$factura->periodo_id}}">  
                                    <input type="hidden" id="mes_id"        name="mes_id"        value="{{$factura->mes_id}}">  
                                    <input type="hidden" id="dia_id"        name="dia_id"        value="{{$factura->dia_id}}">  
                                    <input type="hidden" id="factura_folio" name="factura_folio" value="{{$factura->factura_folio}}">  
                                    <label style="color:green;">Folio factura: </label><b>{{$factura->factura_folio}}</b>
                                </td>
                                <td style="text-align:center; vertical-align: middle;">  
                                    <input type="hidden" id="cliente_id" name="cliente_id" value="{{$factura->cliente_id}}">  
                                    <label style="color:green;">Cliente: </label><b>
                                    @foreach($regcliente as $cli)
                                        @if($cli->cliente_id == $factura->cliente_id)
                                            {{trim($cli->cliente_nombrecompleto)}}
                                            @break
                                        @endif
                                    @endforeach
                                    </b>                                    
                                </td>                                
                                <td style="text-align:center; vertical-align: middle;">   
                                    <input type="hidden" id="emp_id" name="emp_id" value="{{$factura->emp_id}}">  
                                    <label style="color:green;">Vendedor : </label><b>
                                    @foreach($regempleado as $emp)
                                        @if($emp->emp_id == $factura->emp_id)
                                            {{trim($emp->emp_nombrecompleto)}}
                                            @break
                                        @endif
                                    @endforeach
                                    </b>                                                                        
                                </td>                                                                     
                                <td style="text-align:right; vertical-align: middle;">   
                                </td>                    
                                <td style="text-align:right; vertical-align: middle;">   
                                    <label style="color:green;">Fecha registro:</label>
                                    <b>{{date("Y/m/d", strtotime($factura->fecreg))}}</b>
                                </td>                                                                                               
                            </tr>      
                            <tr>
                                <td style="text-align:left; vertical-align: middle;"> 
                                    <input type="hidden" id="tipocredito_id" name="tipocredito_id" value="{{$factura->tipocredito_id}}">  
                                    <label style="color:green;">Crédito: </label>
                                    @foreach($regtipocredito as $credito)
                                        @if($credito->tipocredito_id == $factura->tipocredito_id)
                                            {{$credito->tipocredito_desc}}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td style="text-align:center; vertical-align: middle;"> 
                                    <input type="hidden" id="efactura_montosubsidio" name="efactura_montosubsidio" value="{{$factura->efactura_montosubsidio}}">  
                                    <label style="color:green;">Monto subsidiado: </label><b>${{number_format($factura->efactura_montosubsidio,2)}}</b>
                                </td>                                
                                <td style="text-align:center; vertical-align: middle;"> 
                                    <input type="hidden" id="efactura_montoaportaciones" name="efactura_montoaportaciones" value="{{$factura->efactura_montoaportaciones}}">  
                                    <label style="color:green;">Monto de aportaciones: </label><b>${{number_format($factura->efactura_montoaportaciones,2)}}</b> 
                                </td>                                

                                <td style="text-align:right; vertical-align: middle;">   
                                    <input type="hidden" id="efactura_numaportaciones" name="efactura_numaportaciones" value="{{$factura->efactura_numaportaciones}}">  
                                    <label style="color:green;">Pagos a realizar: </label><b>{{number_format($factura->efactura_numaportaciones,2)}}</b>
                                </td>
                                <td style="text-align:right; vertical-align: middle;">   
                                    <label style="color:green;">Fecha de pago:</label>
                                    <b> {{substr($factura->efactura_fecaportacion1,0,10)}}</b>
                                </td>                                                             
                            </tr>   
                            @endforeach     
                            </table>

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Producto </label>
                                    <select class="form-control m-bot15" name="codigo_barras" id="codigo_barras" required>
                                        <option selected="true" disabled="disabled">Seleccionar producto </option>
                                        @foreach($producto as $prod)
                                            @if($prod->codigo_barras == $regfacturaprod->codigo_barras)
                                                <option value="{{$prod->codigo_barras}}" selected>{{trim($prod->descripcion)}}</option>
                                            @else                                                                                
                                                <option value="{{$prod->codigo_barras}}">{{trim($prod->descripcion)}}</option>
                                            @endif
                                        @endforeach
                                    </select>                                    
                                </div>                                                               
                            </div>

                            <div class="row">  
                                <div class="col-xs-2 form-group">
                                    <label >Cantidad </label>
                                    <input type="number" min="0" max="999999" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad a facturar " value="{{$regfacturaprod->cantidad}}" required>
                                </div>                                                                      
                            </div>                    
                            
                            <div class="row">
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-md-12 offset-md-5">
                                    {!! Form::submit('Guardar',['class' => 'btn btn-success btn-flat pull-right']) !!}
            
                                    @foreach($regfacturaprod as $partida)
                                       <a href="{{route('verfactProductos',array($regfacturaprod->periodo_id,$regfacturaprod->factura_folio))}}" role="button" id="cancelar" class="btn btn-danger">Cancelar
                                       </a>
                                       @break
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('request')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\facturaproductoRequest','#actualizarfactProducto') !!}
@endsection

@section('javascrpt')
    <script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        startDate: '-29y',
        endDate: '-18y',
        startView: 2,
        maxViewMode: 2,
        clearBtn: true,        
        language: "es",
        autoclose: true
    });
    </script>
@endsection
