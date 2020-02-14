@extends('layouts.master')
@section('content')

<div class="row" style="margin-top:20px">

<div class="col-md-offset-3 col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                Añadir Category
            </h3>
        </div>

        <div class="panel-body" style="padding:30px">

    <form action="{{ url('/category') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
            <div class="form-group">
  					<label for="title">Título</label>
  					<input type="text" name="title" id="title" class="form-control">
					</div>

					<div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" id="description" class="form-control">
					</div>

                 
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Es adult??</label>
                    <select class="form-control"  name="adult" id="adult" style="height:30px">
                    <option>NO</option>
                    <option>SI</option>
                    </select>
                    </div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Añadir Category
						</button>
					</div>
        

            </form>

        </div>
    </div>
</div>
</div> 
@stop