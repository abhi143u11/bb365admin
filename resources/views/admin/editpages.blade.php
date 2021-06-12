@extends('layouts.master')

@section('title')
    Edit Pages 
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
                            <div class="col-md-12">

                                <form action="{{ url('pages-update/' . $pages->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $pages->id }}">


                                    <div class="form-group">
                                        <label for="page_title">Pages Title:</label>
                                        <input type="page_title" name="page_title" value="{{ $pages->page_title }}"
                                            class="form-control" id="page_title">
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-4 col-form-label">Page Description:</label>
                                    <textarea name="page_description" id="page_description" class="summernote" required>{{$pages->page_description}}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('pages') }}" class="btn btn-danger">Cancel</a>
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
<script>
    $(document).ready(function() {

        $('.summernote').summernote({
            height: 500 //set editable area's height

        });
    });
    </script>
@endsection
