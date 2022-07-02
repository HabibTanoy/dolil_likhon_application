@extends('layouts.master')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Daag Number</th>
                        <th>Mouja</th>
                        <th>Khotian</th>
                        <th>Buyer</th>
                        <th>Seller</th>
                        <th>Date</th>
                        <th width="100px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('.data-table').DataTable({

            processing: true,
            serverSide: true,
            ajax: "{{ route('dolil-list') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'daag_number', name: 'daag_number'},
                {data: 'mouja', name: 'mouja'},
                {data: 'khotian', name: 'khotian'},
                {data: 'buyer', name: 'buyer'},
                {data: 'seller', name: 'seller'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ],
            "columnDefs": [
                { "width": "10%", "targets": 6 }
            ],
            "columnDefs": [
            { "width": "10%", "targets": 7 }
            ]
        });
    })
</script>
@endpush
