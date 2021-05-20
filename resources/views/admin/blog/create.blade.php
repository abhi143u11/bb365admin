@extends('layouts.master')

@section('title')
Blog
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
<div class="modal fade" id="blogmodal"  role="dialog" aria-labelledby=""
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ action('BlogController@store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="photo">
                        <label class="custom-file-label" for="photo"><b>Choose Photo</b></label>
                    </div>

                    <div class="form-group">
                        <label for="name"><b>Name:</b></label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="description"><b>description:</b></label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tags"><b>Tags:</b></label>
                        <input type="text" name="tags" class="form-control" id="tags">
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
                    data-target="#blogmodal">
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
                          Name
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                           Tags
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                             <td>
                                <img src="{{ URL::to('/') }}/images/{{ $blog->photo }}" class="img-thumbnail" width='60' />  
                            </td>
                            <td>
                                {{ $blog->name }}
                            </td>
                            <td>
                                {{ $blog->description}}
                            </td>
                            <td>
                                {{ $blog->tags }}
                            </td>
                            <td data-url="{{ url('blogs-delete/' . $blog->id ) }}">
                                <a href="{{ url('blogs-edit/' . $blog->id ) }}"
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

</script>

@endsection