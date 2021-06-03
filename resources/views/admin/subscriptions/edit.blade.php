@extends('layouts.master')

@section('title')
@php $title = "Edit subscription"; @endphp
@php echo $title; @endphp 
@endsection

@section('content')

<div class=" container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox ibox-info">
                <div class="ibox-title">

                    <h5>@php echo $title; @endphp</h5>

                </div>
                <div class="ibox-content">
                    <form action="{{ url('subscriptions-update/'.$subscriptions->subscription_id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

             <div class="form-group">
            <label for="subscription_name" class="col-form-label">Subscription Name:</label>
            <input type="text" name="subscription_name" class="form-control" value="{{ $subscriptions->subscription_name }}">
          </div>

          <div class="form-group">
            <label for="amount" class="col-form-label">Amount:</label>
            <input type="text" name="amount" class="form-control" value="{{ $subscriptions->amount }}">
          </div>

          <div class="form-group">
            <label for="credit" class="col-form-label">Downloads:</label>
            <input type="text" name="downloads" class="form-control" value="{{ $subscriptions->downloads }}">
          </div>

          <div class="form-group">
            <label for="credit" class="col-form-label">Days:</label>
            <input type="text" name="days" class="form-control" value="{{ $subscriptions->days }}">
          </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-md">Update</button>
                            <a href="{{ url('subscriptions') }}" class="btn btn-danger btn-md">Cancel</a>
                        </div>

                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection
