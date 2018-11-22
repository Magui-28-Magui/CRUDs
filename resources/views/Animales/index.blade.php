@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Animales</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('LAnimales.create') }}" class="btn btn-info" >Añadir Animal</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Raza</th>
               <th>Color</th>
               <th>Edad</th>
               <th>Animal_id</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($ListaAnimales->count())  
              @foreach($ListaAnimales as $LAnimales)  
              <tr>
                <td>{{$LAnimales->nombre}}</td>
                <td>{{$LAnimales->raza}}</td>
                <td>{{$LAnimales->color}}</td>
                <td>{{$LAnimales->edad}}</td>
                <td>{{$LAnimales->Animal_id}}</td>
        
                <td><a class="btn btn-primary btn-xs" href="{{action('AnimalController@edit', $LAnimales->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('AnimalController@destroy', $LAnimales->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $LAnimales->links() }}
    </div>
  </div>
</section>
 
@endsection