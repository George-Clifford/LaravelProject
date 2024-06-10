@extends('layout.app')
@section('title','Edit User')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User
                            <a href="{{url('users')}}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('users/'.$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Username</label>
                                <input type="text" name="username" value="{{$user->username}}" class="form-control"/>
                                @error('username') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" readonly value="{{$user->email}}" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control"/>
                                @error('password') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role}}" {{in_array($role, $userRoles)? 'selected':''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('roles') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>   
@endsection 