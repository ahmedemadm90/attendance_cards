@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection
@section('content')
<a class="btn btn-success" href="{{route('employees.index')}}">Back</a>
<hr>
    <div class="card col-md-6 col-lg-6 m-auto">
        @include('layouts.errors')
        <div class="card-body">
            <form action="{{route('employees.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="arname">Serial</label>
                    <input type="number" class="form-control" id="serial" name="serial">
                </div>
                <div class="row">
                    <div class="form-group col-md col-lg">
                        <label for="arname">En Name</label>
                        <input type="text" class="form-control" id="enname" name="en_name">
                    </div>
                    <div class="form-group col-md col-lg">
                        <label for="arname">Ar Name</label>
                        <input type="text" class="form-control" id="arname" name="ar_name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md col-lg">
                        <label for="vp_id">Vp</label>
                        <select class="form-control form-select" name="vp_id">
                            <option selected hidden disabled>Please Select Vp</option>
                            @foreach (App\Models\Vp::all() as $vp)
                                <option value="{{ $vp->id }}">{{ $vp->vp_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md col-lg">
                        <label for="area_id">Area</label>
                        <select class="form-control form-select" name="area_id">
                            <option selected hidden disabled>Please Select Area</option>
                            @foreach (App\Models\Area::all() as $area)
                                <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md col-lg">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position">
                    </div>
                    <div class="form-group col-md col-lg">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="hc_classification">HC Classification</label>
                        <input type="text" class="form-control" id="hc_classification" name="hc_classification">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md form-group">
                        <label for="type">Employee Type</label>
                        <select class="form-control form-select" id="type" name="type">
                            <option selected hidden disabled>Please Select Employee Type</option>
                            <option value="direct">Direct</option>
                            <option value="in-direct">In-Direct</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('title')
    Create New Employee
@endsection
@section('sidenavbar')
    @include('layouts.sidenavbar')
@endsection
