@extends('layouts.master')

@section('title')
    Edit Customers 
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <form action="{{ url('users-update/' . $users->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $users->id }}">

                                    <div class="form-group">
                                    <label for="name" class="col-form-label">Name:</label>
                                    <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                    <label for="phone" class="col-form-label">Phone:</label>
                                    <input type="text" name="phone" value="{{ $users->phone }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                    <label>User Type</label>
                                    <select name="usertype" class="form-control">
                                        <option value="">Select User Type</option>
                                        <option value="customer" {{ ($users->usertype == "customer")? "selected" : "" }}>Customer</option>
                                        <option value="admin" {{ ($users->usertype == "admin")? "selected" : "" }}>Admin</option>
                                    </select>
                                    </div>


                                    <div class="form-group">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="email" name="email" value="{{ $users->email }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                    <label for="password" class="col-form-label">Password:</label>
                                    <input type="password" name="password"  class="form-control">
                                </div>
                                
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('users') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


@endsection



@section('scripts')

@endsection
