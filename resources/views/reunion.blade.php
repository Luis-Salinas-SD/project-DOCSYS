@include('partials.nav')
<!--/////////////////////////////////////////////////////////INSERTAR /////////////////////////////////////////////////////////////////////// -->
@if( $seccion == 1 )

<div align="center">Registro reunion</div>
<br>
<div class="container">
  <form action="EnvioReunion" method="POST">

    @csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nombre reunion:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">

      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Fecha inicio: </label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="f_inicio" value="{{old('f_inicio')}}">
        @error('f_inicio')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Fecha fin: </label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="f_fin" value="{{old('f_fin')}}">
        @error('f_fin')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
        @enderror
      </div>
    </div>



    <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Tipo de reunion: </label>
      <div class="col-sm-10">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="t_reunion" value="Reunion calidad">
          <label class="form-check-label" for="inlineRadio1">Reunion calidad</label>
        </div>


        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="t_reunion" value="Reunion mejora">
          <label class="form-check-label" for="inlineRadio2">Reunion mejora</label>
        </div>
        @error('t_reunion')
        <br>
        <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
        </div>
        @enderror
      </div>
    </div>
    <!--
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Tipo de reunion: </label>
    <div class="col-sm-10">
    <select multiple class="form-control" name="t_reunion">
      <option value="Reunion calidad">Reunion calidad</option>
      <option value="Reunion mejora">Reunion mejora</option>
    
    </select>
    </div>
  </div>-->
    <div class="form-group row" align="center">

      <button type="button" class="btn btn-success" onclick="saveconfirm();">Registrar </button>
      <button type="submit" id="btnSend" style="display: none"></button>
      <button type="reset" id="re" class="btn btn-danger">Cancelar</button>

    </div>
  </form>
</div>

@endif
<!--/////////////////////////////////////////////////////////Modificacion /////////////////////////////////////////////////////////////////////// -->
@if( $seccion == 2 )
<div>
  <div align="center">Editar reunion</div>
  <br>
  <div class="container">
    <form action="{{route('actualizarreunion')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id_reunion" value="{{$datos->id_reunion}}" class="form-control">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nombre reunion:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nombre" value="{{old('nombre',$datos->nombre)}}">
          @error('nombre')
          <br>
          <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
          </div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Fecha inicio: </label>
        <div class="col-sm-10">

          <input type="date" class="form-control" name="f_inicio" value="{{old('f_inicio',$datos->f_inicio)}}">

          @error('f_inicio')
          <br>
          <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
          </div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Fecha fin: </label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="f_fin" value="{{old('f_inicio',$datos->f_fin)}}">
          @error('f_fin')
          <br>
          <div class="alert alert-danger" role="alert"><small>*{{$message}}</small>
          </div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Tipo de reunion: </label>
        <div class="col-sm-10">
          <select multiple class="form-control" name="t_reunion">
            <option value="{{$datos->tipo_reunion}}" selected readonly><b>{{$datos->tipo_reunion}}</b></option>
            @if( $datos->tipo_reunion != 'Reunion mejora' && $datos->tipo_reunion != 'Reunion calidad')
            <option value="Reunion mejora">Reunion mejora</option>
            <option value="Reunion calidad">Reunion calidad</option>

            @elseif($datos->tipo_reunion == 'Reunion mejora')
            <option value="Reunion calidad">Reunion calidad</option>
            @else
            <option value="Reunion mejora">Reunion mejora</option>
            @endif
          </select>
        </div>
      </div>
  </div>
  <div class="form-group row" align="center">
    <button type="button" class="btn btn-success" onclick="updateconfirm();">Actualizar </button>
    <button type="submit" id="btnupdate" style="display: none"></button>
    <a href="{{route('consultareun')}}" class="btn btn-danger" type="button">Regresar</a>
  </div>
  </form>


  @endif