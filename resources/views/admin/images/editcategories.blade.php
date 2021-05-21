@extends('layouts.master')

@section('title')
    Edit Product Categories 
@endsection



@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>@yield('title') </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ url('categories-update/' . $categories->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $categories->id }}">

                                    <div class="form-group">
                                        <img src="{{ URL::to('/') }}/images/{{ $categories->img }}" class="img-thumbnail" width="70">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                            value="{{ $categories->image }}">
                                        <label class="custom-file-label" for="image"><b>Choose Image</b></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="name" name="name" value="{{ $categories->cat_name }}" class="form-control"
                                            id="name" aria-describedby="phoneHelp">
                                    </div>
                                    <div class="form-group">
                                        <label>Order No</label>
                                        <input type="text" name="order_no" value="{{ $categories->order_no }}" class="form-control"
                                            id="order_no" aria-describedby="phoneHelp">
                                    </div>

                
                        <div class="form-group">
                                <label for="active">Active:</label>
                                <select class="form-control" name="active" id="active">
                                    <option value="">Select Active</option>
                                    <option value="1" {{ $categories->active  == "1" ? 'selected="selected"' : '' }}>Active</option>    
                                    <option value="0"  {{ $categories->active  == "0" ? 'selected="selected"' : '' }}>In-Active</option>      
                                </select>
                            </div>
                        <div class="form-group">
                                <label for="active">Category Type:</label>
                                <select class="form-control" name="cat_type" id="cat_type">
                                 
                                           <option value="">Select Category Type</option>
                                <option value="1" {{ $categories->cat_type  == "1" ? 'selected="selected"' : '' }}>Business</option>    
                                <option value="2" {{ $categories->cat_type  == "2" ? 'selected="selected"' : '' }}>Common</option>    
                                <option value="3" {{ $categories->cat_type  == "3" ? 'selected="selected"' : '' }}>Festival</option>    
                                     
                                </select>
                            </div>
                        <div class="form-group">
                                <label for="active">Active:</label>
                                <select class="form-control" name="subcat" id="subcat">
                                    <option value="">Select Subcat</option>
                                    <option value="1" {{ $categories->subcat  == "1" ? 'selected="selected"' : '' }}>Has subcat</option>    
                                    <option value="0"  {{ $categories->subcat  == "0" ? 'selected="selected"' : '' }}>No-subcat</option>      
                                </select>
                            </div>
                                 
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('categories') }}" class="btn btn-danger">Cancel</a>
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
