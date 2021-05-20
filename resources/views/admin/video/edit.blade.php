@extends('layouts.master')

@section('title')
    Edit videos
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

                                <form action="{{ url('videos-update/'.$videos->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $videos->id }}">

                                    <div class="form-group">
                                        <img src="{{ URL::to('/') }}/images/{{ $videos->image }}" class="img-thumbnail" width="70">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="photo">
                                        <label class="custom-file-label" for="photo"><b>Choose Photo</b></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="title"><b>Title:</b></label>
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $videos->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="link"><b>Link:</b></label>
                                        <input type="text" name="link" class="form-control" id="link" value="{{ $videos->link }}">
                                    </div>

                                    <div class="form-group">
                                            <label for="product"><b>Products:</b></label>
                                            <select class="form-control" name="product" id="product" style="width:100%;">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                            <option value="{{$product['product_id']}}"
                                                {{ $product['product_id'] == $videos->product_id ? 'selected="selected"' : '' }}>
                                                {{$product['product_name']}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    
                                    <div class="form-group">
                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('videos') }}" class="btn btn-danger">Cancel</a>
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
