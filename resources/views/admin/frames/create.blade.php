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


<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add New Frame</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/customer/frame') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-0">
                        <label for="customer_name">Customer:</label>
                        <select class="form-control select2" name="customer_name" required>
                            <option value="">Select Customer</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->phone  }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Image</label>
                        <input id="regular-form-1" type="file" accept=".jpeg,.jpg,.png,.svg" class="form-control" name="frame_img" required>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary w-24 mr-1 mb-2" id="submit_btn">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->


<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal2" class="modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Delete Frame</h3>
            </div>
            <div class="modal-body">
                <form id="delete_modal_Form" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <div class="modal-body">
                        <input type="hidden" id="id">
                        <h5>Are You Sure Want To Delete This Data?</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->



<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <a class="btn btn-primary shadow-md mr-2" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">+ Add</a>
        </div>


        <!-- BEGIN: Data List -->
        <div class="ibox-content">
            <table id="category" class="table table-report">
                <thead>
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Customer
                        </th>
                        <th>
                            Frame
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($frames as $frame)
                    <tr>

                        <td>{{ $frame->id }}</td>
                        <td>{{ $frame->customer['name'] }}</td>

                        <td><img src="{{ url('/images/frames/'.$frame->frame) }}" width="70" alt="{{ $frame->frame }}">
                        </td>


                        <td>
                            <a href="frame/{{ $frame->id }}/edit" class="btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i> </a>

                            <a href="javascript:void(0)" class="btn-sm btn btn-danger deletebtn" data-target="#delete-confirmation-modal2" data-toggle="modal" onclick="deletedata({{ $frame->id }})" class="btn-sm btn btn-danger" title="Delete"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

    </div>
</div>


@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        $('.select2').select2();

        $('#category').DataTable();

    });
</script>

<script type="text/javascript">
    function deletedata(id) {

        var url = '{{ env('
        APP_URL ') }}';

        document.getElementById('delete_modal_Form').action = url + "frame/" + id;

    }
</script>

@endsection