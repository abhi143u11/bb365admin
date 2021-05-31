@extends('layouts.master')
@section('title')
    @php $title = "Notification Message"; @endphp
    @php echo $title; @endphp 
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Notification Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('NotificationController@store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="sub_cat_id"><b>Categorie:</b></label>
                            <select class="form-control" name="sub_cat_id" id="categorie" style="width:100%;">
                                <option value="">Select Categorie</option>
                                <!-- <option value="all">Select All</option> -->
                                @foreach ($subcategories as $subcategorie)
                                <option value="{{ $subcategorie->sub_cat_id }}-{{ $subcategorie->sub_cat_name }}">{{ $subcategorie->sub_cat_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="s_batches_name">Title:</label>
                            <textarea name="t_title" id="t_title" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="s_batches_name">Message:</label>
                            <textarea name="t_message" id="t_message" class="form-control"></textarea>
                        </div>

                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image"><b>Chooose Image </b></label>
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
    <!-- delete model -->
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title-delete">Confirmation</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- end delete model -->`
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
                              Title
                            </th>
                            <th>
                               Message
                            </th>
                        </thead>
                        <tbody>
                        @foreach ($notification_message as $notification_messag)
                                <tr>
                                    <td>
                                        {{ $notification_messag->t_title }}
                                    </td>
                                  <td>
                                        {{ $notification_messag->t_message }}
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
    <script type="text/javascript">
        $(document).ready(function() {
            //delete model
            var i_notification_msg_id;

            $(document).on('click', '.delete', function() {
                i_notification_msg_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function() {
                var deletepath = "{{ url('/') }}";
                $.ajax({
                    url: deletepath + "/notification-message/destroy/" + i_notification_msg_id,
                    beforeSend: function() {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#ok_button').text('OK');
                            $('#confirmModal').modal('hide');
                            $('#notification_msg_table').DataTable().ajax.reload();
                        });
                    }
                })
            });
        });

        function cleardata() {

            $('#notification_message_form')[0].reset();
            $('#formModal').modal('hide');
            //alert("Data CLeared");
        }

        function reloaddata() {

            $('#notification_msg_table').DataTable().ajax.reload();
        }

    </script>
    <script>
        function funSelectMultiple(data) {

            var msg = $('#t_message').val();

            msg2 = "#" + data + "#";


            msg = msg + " " + msg2;
            $('#t_message').val(msg);
        }
    
$("#categorie").select2();

</script>

@endsection
