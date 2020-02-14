@extends('layouts.master')
@section('content')
<div class="container">
<h1>Llista de pelis</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Títul</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Movies as $key => $Movie )
    <tr>
      <td> {{$Movie->id}} </td>
      <td> {{$Movie->title}} </td>
      <td> 
      <a type="button" class="btn btn-info" href="{{ url('/catalog/show/'.$Movie->id) }}">Mostrar</a>
      </td>
    </tr>
        @endforeach    
  </tbody>
</table>
</div>
@stop