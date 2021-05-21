@extends('layouts.master')

@section('title')
    Slides  

@endsection

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Offer Slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('OffersController@slider') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image"><b>Choose Image </b></label>
                        </div>     

                          <div class="form-group">
                            <label for="category_id"><b>Category:</b></label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $value)
                                <option value="{{ $value->sub_cat_id }}">{{ $value->sub_cat_name }}</option>
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

    <!-- end ----Modal -->

    <!-- Delete confirmation Modal -->
    <div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete @php echo "Offers Slider"; @endphp</h5>
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
                                Image
                            </th>
                            <th>
                                Categorie
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide)
                                <tr>
                                    <td>
                                        <img src="{{ URL::to('/') }}/images/slider/{{ $slide->image }}" class="img-thumbnail" width='80' />
                                    </td>
                                    <td>
                                       {{ $slide->categories['cat_name'] }}
                                    </td>
                                    <td data-url="{{ url('slider-delete/' . $slide->id) }}">
                                         <a href="{{ url('slider-edit/' . $slide->id) }}"
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
