@extends('layouts.master')

@section('title')
Coupons
@endsection

@section('content')
<style>
    .modal {
        z-index: 100000 !important;
    }

    .select2-container--open {
        z-index: 9999999 !important;
        width: 100% !important;
    }

    .select2-container {
        width: 100% !important;
    }
</style>


<div class="col-md-12">

    <!-- BEGIN: Data List -->
    <div class="card">

        <form method="POST" action="{{url('customer/frame',['id' => $frame->id])}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                        <label for="">Image</label></br>
                        <img src="{{ url('/images/frames/'.$frame->frame) }}" width="70" alt="{{ $frame->frame }}">
                    </div>



                    <div class="col-md-4">
                        <label for="regular-form-1">Image</label>
                        <input id="regular-form-1" type="file" class="form-control" name="frame_img">
                    </div>


                    <div class="col-md-4">
                        <label for="customer_name">Customer:</label>
                        <select class="form-control select2" name="customer_name" required>
                            <option value="">Select Customer</option>
                            @foreach ($customers as $customer)
                            <option value="{{$customer['phone']}}" {{ $customer['phone'] == $frame->customer_phone ? 'selected="selected"' : '' }}>
                                {{$customer['name']}}
                            </option>
                            @endforeach
                        </select>
                    </div>


                </div>

            </div>


            <div class="col-md-4">
                <button class="btn btn-primary w-24 mr-1 mb-2">Update</button>
                <a href="{{ url('/customer/frame') }}" class="btn btn-danger w-24 mr-1 mb-2">Cancel</a>
            </div>


        </form>
    </div>
    <!-- END: Data List -->

</div>

@endsection

@section('scripts')
<script>
    $(".select2").select2();
</script>


@endsection