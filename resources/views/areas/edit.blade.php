@extends('layouts.app')
@section('topnavbar')
    @include('layouts.topnavbar')
@endsection

@section('content')
    <div class="col-md card">
        <div class="card-header">
            <h3 class="card-title"><a href="{{route('vps.index')}}" class="btn btn-success">Back</a></h3>
        </div>
        @include('layouts.errors')
        <div class="card-body">
            <form action="{{route('vps.update',$vp->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <label for="inputVpName">VP Name</label>
                    <input type="text" name="vp_name" class="form-control" id="inputVpName" value="{{$vp->vp_name}}">
                </div>
                <div class="text-center m-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('title')
    Edit Vp
@endsection
@section('sidenavbar')
    @include('layouts.sidenavbar')
@endsection
