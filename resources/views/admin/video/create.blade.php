@extends('layouts.master')

@section('title')
Video
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

.select2-container{
        width: 100% !important;
}
</style>

<!-- Modal -->
<div class="modal fade" id="videomodal"  role="dialog" aria-labelledby=""
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ action('VideoController@store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="photo">
                        <label class="custom-file-label" for="photo"><b>Choose Photo</b></label>
                    </div>

                    <div class="form-group">
                        <label for="title"><b>Title:</b></label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>

                    <div class="form-group">
                        <label for="link"><b>Link:</b></label>
                        <input type="text" name="link" class="form-control" id="link">
                    </div>

                    <div class="form-group">
                            <label for="product"><b>Categories:</b></label>
                            <select class="form-control" name="product" id="product" style="width:100%;">
                                <option value="">Select Categories</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->sub_cat_id  }}">{{ $product->sub_cat_id  }}</option>
                                @endforeach
                            </select>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </div>

        </div>
        </form>
    </div>
</div>
<!-- end  Modal -->

<!-- delete Modal -->
<div class="modal fade" id="deletemodalpop" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Coupon"; @endphp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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

<!-- end delete Modal -->
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            <h4 class="card-title">@yield('title')
                <button type="button" class="pull-right btn btn-primary" data-toggle="modal"
                    data-target="#videomodal">
                    + ADD @yield('title')
                </button>
            </h4>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                       <th>
                          Photo
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Link
                        </th>
                        <th>
                           Products
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                    @foreach ($videos as $video)
                        <tr>
                             <td>
                                <img src="{{ URL::to('/') }}/images/{{ $video->image }}"  class="img-thumbnail" width='60' />  
                            </td>
                            <td>
                                {{ $video->title }}
                            </td>
                            <td>
                                {{ $video->link}}
                            </td>
                            <td>
                                {{ $video->products['product_name'] }}
                            </td>
                            <td data-url="{{ url('videos-delete/' . $video->id ) }}">
                                <a href="{{ url('videos-edit/' . $video->id ) }}"
                                class="btn-sm btn btn-warning"
                                data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>  </a>

                                <a href="javascript:void(0)"
                                 class="btn-sm btn btn-danger deletebtn"
                                data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-danger" title="Delete"><i
                                        class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    $('#myTable').on('click', '.deletebtn', function() {

        $tr = $(this).closest('tr');
        var url = $(this).parent("td").data('url');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#delete_id').val(data[0]);

        $('#delete_modal_Form').attr('action', url);

        $('#deletemodalpop').modal('show');

    });
});
$("#product").select2();
</script>



@endsection