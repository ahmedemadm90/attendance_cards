@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection
@section('title')
    Approved Requests
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('requests.create')}}" class="btn btn-success">Create New Request</a></h3>
        </div>
        @include('layouts.sessions')
        <!-- /.card-header -->
        <div class="card-body">
            <table id="vp_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Vp</th>
                        <th>Area</th>
                        <th>Request Date</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\CardRequest::where('admin_approve',1)->get() as $request)
                        <tr>
                            <td>{{ $request->employee->en_name }}</td>
                            <td>{{ $request->employee->vp->vp_name }}</td>
                            <td>{{ $request->employee->area->area_name }}</td>
                            <td>{{ $request->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('requests.adminapprove',$request->id)}}">Admin Approve</a>
                                        <a class="dropdown-item" href="{{route('requests.check',$request->id)}}">Check</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Employee</th>
                        <th>Vp</th>
                        <th>Area</th>
                        <th>Request Date</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('sidenavbar')
    @include('layouts.sidenavbar')
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#vp_table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#vp_table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
