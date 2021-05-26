@extends('layouts.app')
@section('content')
    <div class="box-header with-border">
        <h3 class="box-title"><strong>Users - Add</strong></h3>
    </div>
    <div class="box-body">
        <div class="edit">
            <a href="/users" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-backward"></i>Back</a>
        </div>
        <div class="container">
            @include('common.errors')
            <form action="{{url('edituser/' . $user->id)}}" method="POST" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="user-name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="user-name" class="form-control" value="{{$user->name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email-label" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="email" id="email-label" class="form-control" value="{{$user->email}}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="task-role" class="col-sm-3 control-label">Role:</label>
                    <div class="col-sm-6">
                        <?php
                        $roles = array('admin','manager','user');
                        ?>
                        <select class="form-control input-sm" name="role"
                        @if (Auth::user()->role!='admin') disabled
                        >
                            @endif

                            @foreach($roles as $role)
                                <option value="{{$role}}" @if($role==$user->role) selected @endif>{{$role}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-label" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" id="password-label" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm-password-label" class="col-sm-3 control-label">Confirm password</label>
                    <div class="col-sm-6">
                        <input type="password" name="password_confirmation" id="confirm-password-label" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Edit User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
