@extends('layouts.master')

@section('title')
    Edit Blogs
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

                                <form action="{{ url('blogs-update/'.$blogs->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $blogs->id }}">

                                    <div class="form-group">
                                        <img src="{{ URL::to('/') }}/images/{{ $blogs->photo }}" class="img-thumbnail" width="70">
                                    </div>
                                    <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="photo">
                                    <label class="custom-file-label" for="photo"><b>Choose Photo</b></label>
                                </div>

                                <div class="form-group">
                                    <label for="name"><b>Name:</b></label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $blogs->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="description"><b>description:</b></label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $blogs->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="tags"><b>Tags:</b></label>
                                    <input type="text" name="tags" class="form-control" id="tags" value="{{ $blogs->tags }}">
                                </div>
                                    
                                    <div class="form-group">
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('blogs') }}" class="btn btn-danger">Cancel</a>
                                    </div>
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
