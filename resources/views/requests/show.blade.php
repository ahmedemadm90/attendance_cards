@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection
@section('content')
    <div class="row text-center">
        <a class="btn btn-success" href="{{ route('requests.index') }}">Back</a>
    </div>
    <div class="card col-md-6 m-auto">
        <div class="card-body">
            Employee En Name : {{ $request->employee->en_name }}<br>
            Employee Ar Name : {{ $request->employee->ar_name }}<br>
            Employee VP : {{ $request->employee->vp->vp_name }}<br>
            Employee Area : {{ $request->employee->area->area_name }}<br>
            Employee Access Cards Requests : {{ $request->employee->requests->count() }}<br>
            Employee Access Cards Requests : {{ $request->employee->requests->last()->created_at }}
            <div class="">
                <img class="col-md col-lg"
                    src="{{ asset('media/employees/images/' . $request->employee->requests->last()->emp_image) }}">
            </div>
            <div>
                <a href="{{ asset('media/employees/docs/' . $request->employee->requests->last()->doc_image) }}">Document</a>
            </div>
            <hr>
            @can('Requests Print')
                <div class="row text-center">
                    <a class="btn btn-success m-auto" href="{{ route('requests.print', $request->id) }}"
                        target="blank">Print</a>
                </div>
            @endcan

        </div>

    </div>
@endsection
@section('title')
    Access Card Request Information
@endsection
@section('sidenavbar')
    @include('layouts.sidenavbar')
@endsection
