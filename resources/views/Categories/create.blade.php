@extends('layouts.app')
@section('content')
    <div class="box-header with-border">
        <h3 class="box-title"><strong>Categories manage - Add</strong></h3>
    </div>
    <div class="box-body">
        <div class="add">
            <a href="categorylist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i>Back</a>
        </div>
        <div class="container">
            <form action="{{url('addcategory')}}" method="POST" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="category-name" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add Category
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
