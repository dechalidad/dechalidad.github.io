@extends('template/base')
@section('title','Master - News & Event')
@section('container')
<!-- Page Heading -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master - News & Event</h1>
    <a href="{{ url('master-news/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
</div>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Datalist News & Event</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Article Type</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('master-news.index') }}",
            columns: [{
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'language',
                    name: 'language'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });

    $('#dataTable').on('submit', '.process-delete', function(e) {
        e.preventDefault();
        if (confirm('Are you sure to delete this data?')) {
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                method: 'post',
                data: $(this).serialize(),
                success: function(xhr) {
                    if (xhr.status == 200) {
                        alert(xhr.message);
                        location.reload();
                    } else {
                        alert(xhr.message);
                    }
                }
            })
        }
    });
</script>
@endsection