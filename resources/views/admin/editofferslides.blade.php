@extends('layouts.master')

@section('title')
    Edit Offer Slides 
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

                                <form action="{{ url('slider-update/' . $offerslides->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $offerslides->id }}">

                                    <img src="{{ URL::to('/') }}/public/images/slider/{{ $offerslides->image }}" class="img-thumbnail" width='60' />
                                    <div class="form-group">
                                    </div>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image"
                                            value="{{ $offerslides->image }}">
                                        <label class="custom-file-label" for="image"><b>Chooose Image </b></label>
                                    </div>
                                    <div class="form-group">
                                    </div>

                                    <div class="form-group">
                                    <label for="categorie" class="col-form-label"><b>Categorie:</b></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select Categorie</option>
                                            @foreach ($categories as $value)
                                            <option value="{{$value['sub_cat_id']}}"
                                                {{ $value['sub_cat_id'] == $offerslides->category_id ? 'selected="selected"' : '' }}>
                                                {{$value['sub_cat_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('slider') }}" class="btn btn-danger">Cancel</a>
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
