@extends('layouts.master')
@section('content')
<div class="row">

    <div class="col-sm-4">

    <img src="{{$pelicula['poster']}}" style="height:350px"/>
    <div  style="padding-top:20px; padding-left:60px">
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
    <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> TRAILER</button>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Trailer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="{{$pelicula['video']}}" allowfullscreen></iframe>
</div>
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col-sm-8">

    <h1>  {{$pelicula->title}}</h1>
    <h3>Año: {{$pelicula->year}}</h3>
    <h3>Director: {{$pelicula->director}}</h3>
    <h3>Categoria: {{$pelicula->category->title}}</h3>
    <p>
      <p>
        <span style="font-weight: bold;">Resumen:</span> {{$pelicula->synopsis}}
      </p>
    </p>

    <spam><strong>Estado: </strong></spam>
                @if($pelicula->rented)
                <spam>Pelicula actualmente alquilada</spam><p></p>
                <form action="{{ action('CatalogController@putReturn', $pelicula->id) }}" method="POST" style="display:inline">
                    {{ method_field('PUT') }} 
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning" style="display:inline"> Devolver Pelicula </button>                
                </form>
                 @else
                <spam>Pelicula disponible</spam><p></p>
                <form action="{{ action('CatalogController@putRent', $pelicula->id) }}" method="POST" style="display:inline">
                    @method('PUT')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success" style="display:inline">  Alquilar Pelicula </button>             
                </form>
                @endif
                <button type="button" class="btn btn-warning"> <span class="glyphicon glyphicon-heart"></span> Afegir a favorits</button>
                <a type="button" class="btn btn-primary" href="{{ url('/catalog/edit/'.$pelicula->id) }}"><span class="glyphicon glyphicon-pencil"></span> Editar pelicula</a>            
                <form action="{{ action('CatalogController@deleteMovie', $pelicula->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }} 
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" style="display:inline"> <span class="glyphicon glyphicon-trash"></span>  Eliminar Pelicula </button>             
                </form>
              
                <a type="button" class="btn btn-dark" href="{{ url('/catalog') }}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Volver al listado</a>
                
    </div>
    </div>

<hr>
<h3 style="margin-top: 10px;">Comentaris:</h3>
<div id="comentaris">
    @foreach( $reviews as $key => $review )
    <div class="" style="border-left: 5px solid grey;Padding-left: 30px">

        <div class="media mt-3">
            <div class="media-body">
                <h4 class="mt-0"><h1>{{$review->title}}</h1></h4>
                <h5>{{$review->stars}} estrellas</h5>
                <p>{{$review->review}}</p>
                <p style="margin-top:5px; font-size: 14px; color: grey"> --{{$review->created_at->format('d/m/Y')}}  -{{$review->user->name}}</p>
            </div>
        <hr>
        </div>

    </div>
    @endforeach
</div>
<hr>
    

<form style="margin-bottom: 10px" method="POST" action="{{action('CatalogController@postShow', $pelicula->id)}}">
{{ csrf_field() }}
  <div class="form-group" >
  <br>
    <label for="exampleFormControlInput1">Enviar comentari:</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Resum comentari">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Selecciona el numero de estrelles:</label>
    <select class="form-control"  name="stars" id="stars" style="height:30px">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <textarea class="form-control" name="review" id="review" placeholder="Dona'ns la teva opinio" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-success">Valorar</button>
  <button class="btn btn-dark"  type="reset" value="Reset">Cancel·lar</button>
</form>

   
</div>
@stop
