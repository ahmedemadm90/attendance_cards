<?php

namespace App\Http\Controllers;

use App\Models\Vp;
use Illuminate\Http\Request;

class VpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vps = Vp::all();
        return view('vps.index',compact('vps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vp_name'=>'required|string|max:50|unique:vps,vp_name'
        ]);
        try {
            Vp::create([
                'vp_name'=>$request->vp_name
            ]);
            return redirect()->route('vps.index')->with(['success'=>'Vp Created Successfully']);
        } catch (\Throwable $th) {
            return redirect()->route('vps.index')->with(['success' => 'Something Went Side Ways Please Call Your System Admin']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vp  $vp
     * @return \Illuminate\Http\Response
     */
    public function show(Vp $vp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vp  $vp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vp = Vp::find($id);
        return view('vps.edit',compact('vp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vp  $vp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $vp = Vp::find($id);
        $request->validate([
            'vp_name' => 'required|string|max:50|unique:vps,vp_name,'.$id,
        ]);
        $vp->update([
            'vp_name'=>$request->vp_name
        ]);
        return redirect()->route('vps.index')->with(['success' => 'Vp Created Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vp  $vp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vp $vp)
    {
        //
    }
}
