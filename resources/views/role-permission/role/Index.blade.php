@extends('layout.app')
@section('title','Roles')
@section('content')


    
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (@session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Roles
                            <a href="{{url('roles/create')}}" class="btn btn-primary float-end">Add Role</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a href="{{url('roles/'.$role->id.'/give-permission')}}"  class="btn btn-success">Add / Edit Permission</a>
                                        <a href="{{url('roles/'.$role->id.'/edit')}}" class="btn btn-success">Edit</a>
                                        <a href="{{('roles/'.$role->id.'/delete')}}" class="btn btn-danger mx-2">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>   
@endsection 