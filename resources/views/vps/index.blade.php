@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection


@section('title')
    All VPs
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('vps.create')}}" class="btn btn-success">Create New Vp</a></h3>
        </div>
        @include('layouts.sessions')
        <!-- /.card-header -->
        <div class="card-body">
            <table id="vp_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Vp Name</th>
                        <th>Employees Count</th>
                        <th>Tools</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Vp::all() as $vp)
                        <tr>
                            <td>{{ $vp->vp_name }}</td>
                            <td>{{ $vp->employees->count() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('vps.edit',$vp->id)}}">Edit</a>
                                        <a class="dropdown-item" href="{{route('vps.show',$vp->id)}}">Show</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Vp Name</th>
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
            $("#vp_table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#vp_table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
