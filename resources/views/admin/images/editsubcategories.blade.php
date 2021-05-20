@extends('layouts.master')

@section('title')
    Edit Sub subcategory 
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
                                <form action="{{ url('subcategory-update/' . $subcategory->sub_cat_id ) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $subcategory->sub_cat_id  }}">

                                    <div class="form-group col-md-6">
                                        <img src="{{ URL::to('/') }}/public/images/subcategory/{{ $subcategory->img }}" class="img-thumbnail" width="70">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                            value="{{ $subcategory->image }}">
                                        <label class="custom-file-label" for="image"><b>Choose Image</b></label>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Name</label>
                                        <input type="name" name="name" value="{{ $subcategory->sub_cat_name }}" class="form-control"
                                            id="name" aria-describedby="phoneHelp">
                                    </div>
                                 
<div class="form-group col-md-6">
                            <label for="subcategory_id">Festival Date:</label>
                          <input type="date" name="festival_date" class="form-control">
                        </div>
                  <div class="form-group col-md-6">
                            <label for="category_id">Category:</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $value)
                                <option value="{{ $value->id }}" {{ $subcategory->cat_id  == $value->id ? 'selected="selected"' : '' }}>{{ $value->cat_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="active">Active:</label>
                                <select class="form-control" name="active" id="active">
                                    <option value="">Select Active</option>
                                    <option value="1" {{ $subcategory->active  == "1" ? 'selected="selected"' : '' }}>Active</option>    
                                    <option value="0"  {{ $subcategory->active  == "0" ? 'selected="selected"' : '' }}>In-Active</option>      
                                </select>
                            </div>
                                 
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('subcategory') }}" class="btn btn-danger">Cancel</a>
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
