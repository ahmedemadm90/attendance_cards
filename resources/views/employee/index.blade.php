@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection


@section('title')
    All Employees
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('employees.create')}}" class="btn btn-success">Create New Employee</a></h3>
        </div>
        @include('layouts.sessions')
        <!-- /.card-header -->
        <div class="card-body">
            <table id="area_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Vp Name</th>
                        <th>Area Name</th>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Hc Classification</th>
                        <th>Type</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Employee::all() as $emp)
                        <tr>
                            <td>{{ $emp->serial }}</td>
                            <td>{{ $emp->vp->vp_name }}</td>
                            <td>{{ $emp->area->area_name }}</td>
                            <td>{{ $emp->en_name }}</td>
                            <td>{{ $emp->ar_name }}</td>
                            <td>{{ $emp->position }}</td>
                            <td>{{ $emp->company }}</td>
                            <td>{{ $emp->email }}</td>
                            <td>{{ $emp->hc_classification }}</td>
                            <td>{{ $emp->type }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('employees.edit',$emp->id)}}">Edit</a>
                                        <a class="dropdown-item" href="{{route('requests.create')}}">Request</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Vp Name</th>
                        <th>Area Name</th>
                        <th>English Name</th>
                        <th>Arabic Name</th>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Hc Classification</th>
                        <th>Type</th>
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
            $("#area_table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#area_table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
