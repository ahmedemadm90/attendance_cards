@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection


@section('title')
    All Areas
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('areas.create')}}" class="btn btn-success">Create New Area</a></h3>
        </div>
        @include('layouts.sessions')
        <!-- /.card-header -->
        <div class="card-body">
            <table id="area_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Area Name</th>
                        <th>VP Name</th>
                        <th>Employees Count</th>
                        <th>Tools</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Area::all() as $area)
                        <tr>
                            <td>{{ $area->area_name }}</td>
                            <td>{{ $area->vp->vp_name }}</td>
                            <td>{{ $area->employees->count() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('areas.edit',$area->id)}}">Edit</a>
                                        <a class="dropdown-item" href="{{route('areas.show',$area->id)}}">Show</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Area Name</th>
                        <th>VP Name</th>
                        <th>Employees Count</th>
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
