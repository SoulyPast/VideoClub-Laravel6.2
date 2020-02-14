@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modeficar película
                </div>
                <div class="card-body" style="padding:30px">
                <form action="{{ url('/catalog/edit/'.$pelicula->id) }}" method="post" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" value="{{$pelicula->title}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="year">Año</label>
                            <input type="text" name="year" id="year" value="{{$pelicula->year}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="director">Director</label>
                            <input type="text" name="director" id="director" value="{{$pelicula->director}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="poster">Poster</label>
                            <input type="text" name="poster" id="poster"  value="{{$pelicula->poster}}"class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="video">Video</label>
                            <input type="text" name="video" id="video"  value="{{$pelicula->video}}"class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona la categoria:</label>
                        <select class="form-control"  name="categoria" id="categoria" style="height:30px">
                        @foreach( $Categories as $key => $Categorie )
                        
                        @if($Categorie->title == $pelicula->category->title)
                        <option selected='selected'>{{$Categorie->title}}</option>
                    
                        @else <option>{{$Categorie->title}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>

                        <div class="form-group">
                            <label for="synopsis">Resumen</label>
                            <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$pelicula->synopsis}}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar película
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop