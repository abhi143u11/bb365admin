@extends('layouts.master')

@section('title')
    Edit Customers 
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

                                <form action="{{ url('customers-update/' . $customers->id) }}" method="POST"
                                    enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" class="" name="id" id="id" value="{{ $customers->id }}">

                                    <div class="form-group">
                                <label for="name"><b>Name:</b></label>
                                <input type="text" name="name" class="form-control text-capitalize" id="" value="{{ $customers->name }}">
                                    </div> 

                                <div class="form-group">
                                    <label for="phone"><b>Mobile No:</b></label>
                                    <input type="text" name="mobile" class="form-control" id="" value="{{$customers->phone }}">
                                </div>

                                <button name="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('customers') }}" class="btn btn-danger">Cancel</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<hr>

@endsection

@section('scripts')
    <script>
            $(document).ready(function() {

                $('#myTable2').on('click', '.deletebtn', function() {

            $tr = $(this).closest('tr');
            var url = $(this).parent("td").data('url');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            $('#delete_id1').val(data[0]);                           

            $('#delete_modal_Form').attr('action', url);

            $('#deletemodalpop').modal('show');

            });

            });

    </script>

@endsection

