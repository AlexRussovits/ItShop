@extends('layouts.app')
@section('content')
    <div class="box-header with-border">
        <h3 class="box-title"><strong>Users manage</strong></h3>
        <div class="add">
            <a href="adduser" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>New</a>
        </div>
    <div class="pull-right">
        <form class="form-inline" action="{{url('userByRole')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Role: </label>
                <select class="form-control input-sm" name="role" onchange="submit();">
                    <option>Select</option>
                    <option value="0">All</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="user">User</option>
                </select>
            </div>
        </form>
    </div>

        <div class="box-body">
            @if(!empty($users))
                <table class="table table-bordered">
                    <thead>
                        <th width="20%">Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Tools</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <a href="{{url('edituser/' . $user->id)}}" class="btn btn-success btn-sm edit btn-flat">
                                    <i class="fa fa-edit">Edit</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>Data no found</p>
            @endif
        </div>
@endsection
