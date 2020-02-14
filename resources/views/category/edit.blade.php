@extends('layouts.master')
@section('content')

<div class="row" style="margin-top:20px">

<div class="col-md-offset-3 col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                Modificar Category
            </h3>
        </div>

        <div class="panel-body" style="padding:30px">

    <form action="{{ url('/category/'.$Categorie->id) }}" method="post" enctype="multipart/form-data">
    {{method_field('PUT')}}
    {{ csrf_field() }}
            <div class="form-group">
  					<label for="title">Título</label>
  					<input type="text" name="title" id="title" value="{{$Categorie->title}}" class="form-control">
					</div>

					<div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" id="description" value="{{$Categorie->description}}" class="form-control">
					</div>

                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Es adult??</label>
                    <select class="form-control"  name="adult" id="adult" style="height:30px">
                    @if($Categorie->adult == "SI"){
                        <option selected='selected'>SI</option>
                        <option>NO</option>
                    }
                    @else{
                        <option>SI</option>
                        <option selected='selected'>NO</option>
                    }
                    @endif
                   
                   
                    </select>
                    </div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Modificar Category
						</button>
					</div>
        

            </form>

        </div>
    </div>
</div>
</div> 
@stop