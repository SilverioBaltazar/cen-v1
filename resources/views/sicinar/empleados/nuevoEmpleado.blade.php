@extends('sicinar.principal')

@section('title','Nuevo cliente')

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
    <meta charset="utf-8">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Menú
                <small> Recursos Humanos - Empleados - Nuevo</small>                
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        
                        {!! Form::open(['route' => 'AltaNuevoEmpleado', 'method' => 'POST','id' => 'nuevoEmpleado', 'enctype' => 'multipart/form-data']) !!}
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <!--
                                <div class="col-xs-2 form-group">
                                    <label >Folio </label>
                                    <input type="number" min="0" max="9999999999" class="form-control" name="emp_folio" id="emp_folio" placeholder="Folio de solicitud" required>
                                </div>
                                -->   
                                <div class="col-xs-3 form-group">
                                    <label>Fecha de solicitud </label>
                                    <input type="date" class="form-control" id="emp_fecring" name="emp_fecing" >
                                </div>                                                                                                    
                            </div>

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Apellido paterno </label>
                                    <input type="text" class="form-control" name="emp_ap" id="emp_ap" placeholder="Apellido paterno" required>
                                </div>  
                                <div class="col-xs-4 form-group">
                                    <label >Apellido materno </label>
                                    <input type="text" class="form-control" name="emp_am" id="emp_am" placeholder="Apellido materno" required>
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label >Nombre(s) </label>
                                    <input type="text" class="form-control" name="emp_nombres" id="emp_nombres" placeholder="Nombre(s)" required>
                                </div>

                            </div>

                            <div class="row">    
                                <div class="col-xs-3 form-group">
                                    <label >CURP </label>
                                    <input type="text" class="form-control" name="emp_curp" id="emp_curp" placeholder="CURP" required>
                                </div>        
                                <div class="col-xs-2 form-group">                        
                                    <label>Sexo </label><br>
                                    <input type="radio" name="emp_sexo" checked value="H" style="margin-right:5px;">Hombre
                                    <input type="radio" name="emp_sexo"         value="M" style="margin-right:5px;">Mujer
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Domicilio (Calle, no.ext/int.) </label>
                                    <input type="text" class="form-control" name="emp_dom" id="emp_dom" placeholder="Domicilio " required>
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label >Colonia)</label>
                                    <input type="text" class="form-control" name="emp_col" id="emp_col" placeholder="Colonia" required>
                                </div>
                                <div class="col-xs-2 form-group">
                                    <label >Código postal </label>
                                    <input type="number" min="0" max="99999" class="form-control" name="emp_cp" id="emp_cp" placeholder="Código postal" required>
                                </div>                               
                            </div>          

                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <label >Entidad nacimiento</label>
                                    <select class="form-control m-bot15" name="entidadnac_id" id="entidadnac_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar entidad de nacimiento</option>
                                        @foreach($regentidades as $estado)
                                            <option value="{{$estado->entidadfederativa_id}}">{{$estado->entidadfederativa_desc}}
                                            </option>
                                        @endforeach
                                    </select>                                  
                                </div>
                                <div class="col-xs-4 form-group">
                                    <label >Municipio</label>
                                    <select class="form-control m-bot15" name="municipio_id" id="municipio_id" required>
                                        <option selected="true" disabled="disabled">Seleccionar municipio</option>
                                        @foreach($regmunicipio as $municipio)
                                            <option value="{{$municipio->municipioid}}">{{$municipio->entidadfederativa_desc.'-'.$municipio->municipionombre}}
                                            </option>
                                        @endforeach
                                    </select>                                  
                                </div>     
                            </div>

                            <div class="row">                                                                
                                <div class="col-xs-4 form-group">
                                    <label >Localidad </label>
                                    <input type="text" class="form-control" name="localidad" id="localidad" placeholder="Localidad" required>
                                </div> 
                                <div class="col-xs-4 form-group">
                                    <label >Referencia del domicilio </label>
                                    <input type="text" class="form-control" name="emp_otraref" id="emp_otraref" placeholder="Referencia del domicilio" required>
                                </div>                                  
                            </div>

                            <div class="row">                                
                                <div class="col-xs-3 form-group">
                                    <label >Teléfono </label>
                                    <input type="number" min="0" max="9999999999" class="form-control" name="emp_tel" id="emp_tel" placeholder="Teléfono" required>
                                </div> 
                                <div class="col-xs-3 form-group">
                                    <label >Celular </label>
                                    <input type="number" min="0" max="9999999999" class="form-control" name="emp_cel" id="emp_cel" placeholder="Celular" required>
                                </div>    
                                <div class="col-xs-3 form-group">
                                    <label >email </label>
                                    <input type="email" class="form-control" name="emp_email" id="emp_email" placeholder="Correo electrónico" required>
                                </div>             
                            </div>

                            <div class="row">
                            <!--               
                                <div class="col-xs-3 form-group">
                                    <label >Georeferenciación latitud </label>
                                    <input type="number" min="0" max="99999999.9999999999" class="form-control" name="emp_georeflatitud" id="emp_georeflatitud" placeholder="Georeferenciación latitud" required>
                                </div> 
                                <div class="col-xs-3 form-group">
                                    <label >Georeferenciación longitud </label>
                                    <input type="number" min="0" max="99999999.9999999999" class="form-control" name="emp_georeflongitud" id="emp_georeflongitud" placeholder="Georeferenciación longitud" required>
                                </div> -->                            
                            </div>
                                
                            <div class="row">               
                                <div class="col-xs-4 form-group">
                                    <label >Archivo digital de solicitud en formato PDF </label>
                                    <input type="file" class="text-md-center" style="color:red" name="emp_foto1" id="emp_foto1" placeholder="Subir archivo digital de solicitud en formato PDF">
                                </div>   
                            </div>                    

                            <div class="row">
                                <div class="col-md-12 offset-md-5">
                                    {!! Form::submit('Registrar',['class' => 'btn btn-primary btn-flat pull-right']) !!}
                                    <a href="{{route('verEmpleados')}}" role="button" id="cancelar" class="btn btn-danger">Cancelar</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\empleadoRequest','#nuevoEmpleado') !!}
@endsection

@section('javascrpt')
<script>
    function soloNumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "1234567890";
       especiales = "8-37-39-46";
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }    

    function soloAlfa(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ.";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    function general(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890,.;:-_<>!%()=?¡¿/*+";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    function soloAlfaSE(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key);
       letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }    
</script>

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
