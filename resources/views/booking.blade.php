@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Bookings</h3>
              </div>
              <div class="card-body table-responsive">
                <table id="bookings" class="table table-bordered table-hover responsive">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>No Of People</th>
                    <th>Type</th>
                    <th>Booking Date</th>
                    <th width="100px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script>
  $(function () {

    $('#bookings').DataTable({
         processing: true,
        serverSide: true,
        ajax: "{{ route('bookings.list') }}",
         columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_no', name: 'phone_no'},
            {data: 'no_of_people', name: 'no_of_people'},
            {data: 'type', name: 'type'},
            {data: 'created_at', name: 'created_at'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
  });
</script>
@endsection
