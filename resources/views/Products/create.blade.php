@extends('layouts.app')
@section('content')
    <div class="box-header with-border">
        <h3 class="box-title"><strong>Products manage - Add</strong></h3>
    </div>
    <div class="box-body">
        <div class="add">
            <a href="productlist" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i>Back</a>
        </div>
        <div class="container">
            <form action="{{url('addproduct')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="goods-name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="product-name" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price-label" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-6">
                        <input type="number" name="price" id="price" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="task-photo" class="col-sm-3 control-label">Photo</label>
                    <div class="col-sm-6">
                        <input type="file" name="image" id="photo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category:</strong>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-6">
                        <textarea name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add Product
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
