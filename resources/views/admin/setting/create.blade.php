@extends('layouts.master')

@section('title')
Setting
@endsection

@section('content')
<style>
    .custom-control-label::before,
    .custom-control-label::after {
        top: .8rem;
        width: 1.25rem;
        height: 1.25rem;
    }
</style>

<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">

        </div>
        <div class="ibox-content">
            <div class="table-responsive">

                <form action="{{ url('/setting-update/'.$setting->id) }}" method="post">
                    @csrf

                    <div class="custom-control form-control-lg custom-checkbox">
                        <input type="checkbox" name="free_trial" value="1" @if($setting->free_trial == 1) checked @endif class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Free Trial</label>
                    </div>


                    <button type="submit" class="btn btn-info btn-sm">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


@endsection