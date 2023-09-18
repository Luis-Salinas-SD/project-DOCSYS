
@include('partials.nav')

<div align="center">Consulta reuniones</div>
 <br>
 <div class="container">
<div class="row">
<div class="col-lg-12">
  <br>
<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha inicio</th>
      <th scope="col">Fecha fin</th>
      <th scope="col">Reunion</th>
      @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
     @endif
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $d)
    <tr>
   
    <td>{{$d->id_reunion}}</td>
    <td>{{$d->nombre}}</td>
    <td>{{$d->f_inicio}}</td>
    <td>{{$d->f_fin}}</td>
    <td>{{$d->tipo_reunion}}</td>
    @if( Session::get('srol') == 1  || Session::get('srol') == 2 || Session::get('srol') == 3)
    <td ><a href="{{ route('modificarre',['id'=>$d->id_reunion]) }}"  class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i></a></td>
    <td >
   <form action="{{route('desactivarre',$d->id_reunion)}}" method="POST" class="formulario-eliminar">
       @csrf
       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       <input type="hidden" id="_id" value="{{ $d->id_reunion }}" />
       <input type="submit"  class="btn btn-danger" value="Eliminar">
        
                
    </form>
  
  </td>
    @endif 
  </tr>
    @endforeach
   <!-- <a target="_blank" href="{{asset('public/documentosv/Reporte1.pdf')}}">PDF</a>-->
   
  </tbody>
</table>

</div>
</div>
</div>

<script src="{{ asset('/public/js/alertas.js') }}"></script>