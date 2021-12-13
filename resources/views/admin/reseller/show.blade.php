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
    <div class="ibox">
        <div class="ibox-title">
            <form action="{{ url('/reseller') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row col-md-12">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name"><b>Reseller:</b></label>
                            <select class="form-control select2" name="reseller_code" required />
                            <option value="">Select Reseller</option>
                            @foreach ($resellers as $reseller)

                            @isset($selected_reseller)
                            <option value="{{ $reseller->referral_code }}" {{$selected_reseller == $reseller->referral_code  ? 'selected' : ''}}>{{ $reseller->name }}</option>
                            @else
                            <option value="{{ $reseller->referral_code }}">{{ $reseller->name }}</option>
                            @endisset
                            @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name"><b>From Date:</b></label>
                            <input type="date" name="from_date" class="form-control" id="from_date" value="@isset($selected_from){{ $selected_from }}@else{{ date('Y-m-d',strtotime('-350 days')) }}@endisset" min="2000-01-01" max="2050-01-01">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name"><b>To Date:</b></label>
                            <input type="date" name="to_date" class="form-control" id="to_date" value="@isset($selected_to){{ $selected_to }}@else{{ date('Y-m-d',strtotime('+5 days')) }}@endisset" min="2000-01-01" max="2050-01-01">
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-danger"> Submit</button>
                </div>
            </form>

            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Referral Code
                            </th>
                            <th>
                                Referred By
                            </th>
                        </thead>
                        <tbody>
                            @isset($users)

                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->referral_code }}</td>
                                <td>{{ $user->referred_by }}</td>
                            </tr>
                            @endforeach
                            @endisset

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script>

    </script>

    <script type="text/javascript">
        $(".select2").select2();
    </script>

    @endsection