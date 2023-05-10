@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection
@section('content')
    <div class="col-md-10 card m-auto">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('requests.index') }}" class="btn btn-success">Back</a></h3>
        </div>
        @include('layouts.errors')
        <div class="card-body">
            <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md">
                        <label for="inputVpName">Employee</label>
                        <select name="employee_id" id="" class="form-control form-select select2bs4">
                            <option disabled selected hidden>Choose Employee</option>
                            @foreach (App\Models\Employee::all() as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->en_name }} || {{ $emp->ar_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md">
                        <label for="inputVpName">Employee Image</label>
                        <input type="file" name="emp_image" class="form-control" id="inputVpName">
                        <span class="text-danger">* Only (JPG, JPEG,PNG) Files Allowed</span>
                    </div>
                    <div class="col-md">
                        <label for="inputVpName">Documentaion</label>
                        <input type="file" name="doc_image" class="form-control" id="inputVpName">
                        <span class="text-danger">* Only PDF Files are Allowed</span>
                    </div>
                </div>
                <div class="text-center m-2">
                    <button type="submit" class="btn btn-primary">Request</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('title')
    Create New Request
@endsection
@section('sidenavbar')
    @include('layouts.sidenavbar')
@endsection
@section('scripts')
    <script>
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
