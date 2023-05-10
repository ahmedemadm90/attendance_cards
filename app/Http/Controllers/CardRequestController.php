<?php

namespace App\Http\Controllers;

use App\Mail\RequestNewCardMail;
use App\Models\CardRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CardRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('requests.index');
    }
    public function create()
    {
        return view('requests.create');
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
            'employee_id'=>'required|numeric|exists:employees,id',
            'emp_image'=>'required|file|mimes:jpg,jpeg,png',
            'doc_image'=>'required|file|mimes:pdf'
        ]);
        $emp = Employee::find($request->employee_id);
        $emp_image =$request->emp_image;
        $ext = $emp_image->extension();
        $imageName = $emp->serial . "." . $ext;
        $emp_image->move(public_path("media/employees/images/"), $imageName);
        $doc_image = $request->doc_image;
        $ext = $doc_image->extension();
        $docName = $emp->serial . "." . $ext;
        $doc_image->move(public_path("media/employees/docs/"), $docName);

        $request = CardRequest::create([
            'employee_id'=>$request->employee_id,
            'emp_image'=>$imageName,
            'doc_image'=>$docName,
        ]);

        $data = [
            'request' => $request
        ];
        Mail::send('emails.newrequest', $data, function ($message) use ($request) {
            $message->to('abdelrahman.hashem@cemex.com');
            $message->subject($request->employee->en_name .' Requesting New Access Card');
        });
        return redirect(route('requests.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardRequest  $cardRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = CardRequest::find($id);
        return view('requests.show',compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardRequest  $cardRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CardRequest $cardRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CardRequest  $cardRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardRequest  $cardRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardRequest $cardRequest)
    {
        //
    }
}
