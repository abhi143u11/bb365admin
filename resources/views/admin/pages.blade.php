@extends('layouts.master')

@section('title')
    Pages 

@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('PagesController@store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="page_title">Page Title:</label>
                            <input type="text" name="page_title" class="form-control" id="page_title">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 col-form-label">Page Description:</label>
                        <textarea name="page_description" id="page_description" class="summernote" required></textarea>
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

    <!-- end ----Modal -->

    <!-- Delete confirmation Modal -->
    <div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Page"; @endphp</h5>
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
    <!-- delete data model end -->
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-title">
                <h4 class="card-title">@yield('title')
                    <button type="button" class="pull-right btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">
                       + ADD @yield('title')
                    </button></h4>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">

                    <table class="table table-striped" id="myTable">
                        <thead>
                            <th>
                                Page Title
                            </th>

                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>

                            @foreach ($pages as $page)
                                <tr>
                                    <td>
                                        {{ $page->page_title }}
                                    </td>
                                
                                    <td>
                                        <a href="{{ url('pages-edit/' . $page->id) }}"
                                        class="btn-sm btn btn-warning"
                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i>  </a>
<!-- 
                                        <a href="javascript:void(0)"
                                        class="btn-sm btn btn-danger deletebtn"
                                        data-toggle="tooltip" data-placement="top" class="btn-sm btn btn-danger" title="Delete"><i
                                        class="fa fa-trash"></i> </a> -->
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
    <script>
    $(document).ready(function() {

        $('.summernote').summernote({
            height: 500 //set editable area's height

        });
    });
    </script>

@endsection
