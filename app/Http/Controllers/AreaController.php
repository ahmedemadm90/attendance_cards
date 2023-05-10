<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Employee;
use App\Models\Vp;
use App\Models\Worker;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Areas|Area Create|Area Edit|Area Delete|Area Show', ['only' => ['index', 'store']]);
        $this->middleware('permission:Areas', ['only' => ['index']]);
        $this->middleware('permission:Areas Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Areas Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Areas Delete', ['only' => ['destroy']]);
        $this->middleware('permission:Areas Show', ['only' => ['show']]);
    }

    public function index(Request $request)
    {
        $areas = Area::orderBy('area_name')->paginate(500);
        return view('areas.index', compact('areas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $vps = Vp::get();
        $areas = Area::orderby('id')->simplePaginate(8);
        return view('areas.create', [
            "vps" => $vps,
            "areas" => $areas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'area_name' => 'required|string|max:50|unique:areas,area_name',
            'vp_id' => 'required|numeric|exists:vps,id',
        ]);
        Area::create([
            'area_name' => $request->area_name,
            'vp_id' => $request->vp_id,
        ]);
        return back();
    }


    public function show($id)
    {
        $area = Area::find($id);
        $employees = count(Employee::where('vp_id', $id)->get());
        return view('areas.show', [
            'area' => $area,
            'employees' => $employees
        ]);
    }

    public function edit($id)
    {
        $vps = Vp::get();
        $area = Area::find($id);
        return view('areas.edit', [
            "area" => $area,
            "vps" => $vps
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $request->validate([
            'area_name' => 'required|string|max:25',
            'vp_id' => 'required|numeric|exists:vps,id',
        ]);
        $area->update([
            'area_name' => $request->area_name,
            'vp_id' => $request->vp_id,
        ]);
        return redirect(route('areas.index'));
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
        return redirect(route('areas.index'));
    }
}
