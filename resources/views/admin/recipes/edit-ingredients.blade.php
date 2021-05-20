@extends('layouts.master')

@section('title')
    Edit Ingredients
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

                                <form action="{{ url('ingredients-update/'.$ingredients->recipe_ing_id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $ingredients->recipe_ing_id }}">

                                    <div class="form-group">
                                        <label for="item"><b>Item:</b></label>
                                        <input type="text" name="item" class="form-control" id="item" value="{{ $ingredients->item }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="weight"><b>Weight:</b></label>
                                        <input type="text" name="weight" class="form-control" id="weight" value="{{ $ingredients->weight }}">
                                    </div>

                                    <div class="form-group">
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('recipes-edit/' . $ingredients->recipe_id) }}"class="btn btn-danger">Cancel</a>
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
            height: 150 //set editable area's height

        });
    });
    $("#product").select2();
    </script>
@endsection
