@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection

@section('content')
    <div class="col-md card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('areas.index')}}" class="btn btn-success">Back</a></h3>
        </div>
        <div class="card-body">
            <form action="{{route('areas.store')}}" method="POST">
                @csrf
                <div class="form-row">
                    <label for="inputAreaName">Area Name</label>
                    <input type="text" name="area_name" class="form-control" id="inputAreaName" placeholder="New Area Name">
                </div>
                <div class="form-row">
                    <label for="inputVpId">VP Name</label>
                    <select class="form-select form-control">
                        <option disabled hidden selected>Choose The Vp</option>
                        @foreach (App\Models\Vp::all() as $vp)
                            <option value="{{$vp->id}}">{{$vp->vp_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center m-2">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('title')
    Create New Area
@endsection
@section('sidenavbar')
    @include('layouts.sidenavbar')
@endsection
