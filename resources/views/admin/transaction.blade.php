@extends('layouts.master')

@section('title')
@php $title = "TRANSACTIONS "; @endphp
@php echo $title; @endphp 
@endsection

@section('content')

<div class=" container-fluid">

  <div class="row">

    <div class="col-lg-12 col-sm col-xs">
      <div class="ibox box-info">
        <div class="ibox-title">

          <h5>@php echo $title; @endphp</h4>

        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTables" id="mytable">
              <thead>
                <tr>
                  <th>T.Id</th>
                  <th>Created At</th>
                  <th>Name</th>
                  <th>Mobile</th>
                   <th>Status</th>
                  <th>Payment Method</th>
                  <th>Amount</th>
                  <th>Payment Id</th>
              </thead>
              </tr>
              <tbody>
                @foreach($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->transaction_id }}</td>
                  <td>{{ $transaction->created_at }}</td>
                  <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->mobile_number }}</td>
                 <td>{{ $transaction->status }}</td>
                  <td>{{ $transaction->payment_method }}</td>
                  <td>{{ $transaction->amount }}</td>
                  <td>{{ $transaction->payment_id }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
            "order": [[ 0, "desc" ]],
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
            ]
        });
} );
</script>

@endsection