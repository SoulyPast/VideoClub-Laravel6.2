@extends('layouts.master')

@section('content')

<div class="container">
<h1>Llista de pelis millors</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Punt</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  @foreach($reviews as $key => $review )
    <tr>
      <td> {{$review->movie->title}} </td>
      <td> {{$review->quantity}} </td>
      <td>  <a type="button" class="btn btn-info" href="{{ url('/catalog/show/'.$review->movie->id) }}">Mostrar</a> </td>
    </tr>
        @endforeach    
  </tbody>
</table>
</div>
@stop