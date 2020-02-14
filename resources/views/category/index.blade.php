@extends('layouts.master')
@section('content')
<div class="container">
<h1>Llista de categories</h1>
<a type="button" class="btn btn-success" href="{{ url('/category/create') }}">Afegir categoria</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Títol</th>
      <th scope="col">Descripció</th>
      <th scope="col">Només per adults</th>
      <th scope="col">Accions</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach( $Categories as $key => $Categorie )
    <tr>
      <td> {{$Categorie->id}} </td>
      <td> {{$Categorie->title}} </td>
      <td> {{$Categorie->description}} </td>
      <td> 
      @if($Categorie->adult)
      <a>Si</a>
      @else
      <a>No</a>
      @endif
      <td>
      <a type="button" class="btn btn-info" href="{{ url('/category/'.$Categorie->id) }}">Mostrar</a>
      <a type="button" class="btn btn-warning" href="{{ url('/category/'.$Categorie->id.'/edit') }}">Editar</a>
      </td>
      <td>
      <form action="{{ action('CategoryController@destroy', $Categorie->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }} 
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline"> <span class="glyphicon glyphicon-trash"></span>  Eliminar Category </button>             
                </form>

     
      </td>
    </tr>
        @endforeach    
  </tbody>
</table>
</div>
@stop