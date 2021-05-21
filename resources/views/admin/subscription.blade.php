@extends('layouts.master')

@section('title')
@php $title = "Subscriptions"; @endphp
@php echo $title; @endphp 
@endsection

@section('content')

<!-- Add data model  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add @php echo $title; @endphp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('save-subscriptions') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}


          <div class="form-group">
            <label for="subscription_name" class="col-form-label">Subscription Name:</label>
            <input type="text" name="subscription_name" class="form-control">
          </div>

          <div class="form-group">
            <label for="amount" class="col-form-label">Amount:</label>
            <input type="text" name="amount" class="form-control">
          </div>

          <div class="form-group">
            <label for="credit" class="col-form-label">Downloads:</label>
            <input type="number" name="downloads" class="form-control">
          </div>
            <div class="form-group">
            <label for="credit" class="col-form-label">Days:</label>
            <input type="number" name="days" class="form-control">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- add data model end -->
<!-- Delete confirmation Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete @php echo $title; @endphp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_modal_Form" method="POST">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}


        <div class="modal-body">
          <input type="hidden" id="subscription_id">
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

<div class=" container-fluid">


  <div class="row">

    <div class="col-lg-12 col-sm col-xs">
      <div class="ibox box-info">
        <div class="ibox-title">

          <h5>@php echo $title; @endphp</h4>

        </div>
        <div class="ibox-content">
          <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> Add</i></button>
          <hr>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTables" id="mytable">
              <thead>
                <tr>
                  <th>Subscription Id</th>
                  <th>Subscription Name</th>
                  <th>Amount</th>
                  <th>Downloads</th>
                   <th>Days</th>
                  <th>Edit</th>
                  @if(Auth::user()->usertype == 'superadmin')
                  <th>Delete</th>
                  @endif
              </thead>
              </tr>
              <tbody>


                @foreach($subscriptions as $subscription)
                <tr>
                  <td>{{ $subscription->subscription_id }}</td>
                  <td>{{ $subscription->subscription_name }}</td>
                  <td>{{ $subscription->amount }}</td>
                  <td>{{ $subscription->downloads }}</td>
                  <td>{{ $subscription->days }}</td>
                  <td>
                    <a href="{{ url('edit-subscriptions/'.$subscription->subscription_id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit"><i class="fa fa-edit"></i> </a>
                  </td>
                  @if(Auth::user()->usertype == 'superadmin')
                  <td data-url="{{ url('subscriptions-delete/'.$subscription->subscription_id) }}">
                    <a href="javascript:void(0)" class="btn btn-danger deletebtn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>

            </table>
            <div class="pagination">{{ $subscriptions->links() }}</div>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        //$('#client_table').DataTable();
        $('.dataTables').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'ExampleFile'
                },
                {
                    extend: 'pdf',
                    title: 'ExampleFile'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });


    $('#mytable').on('click', '.deletebtn', function() {

      $tr = $(this).closest('tr');
      var url = $(this).parent("td").data('url');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      $('#delete_subscription_id').val(data[0]);

      $('#delete_modal_Form').attr('action', url);

      $('#deletemodalpop').modal('show');

    });
  });
</script>

@endsection
