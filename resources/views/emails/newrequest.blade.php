<html>

<body>
    <div class="card col-md-6 m-auto">
        <div class="card-body">
            Employee En Name : {{ $request->employee->en_name }}<br>
            Employee Ar Name : {{ $request->employee->ar_name }}<br>
            Employee VP : {{ $request->employee->vp->vp_name }}<br>
            Employee Area : {{ $request->employee->area->area_name }}<br>
            Employee Access Cards Requests : {{ $request->employee->requests->count() }}<br>
            Employee Access Cards Last Request : {{ $request->employee->requests->last()->created_at }}
        </div>
        <p>Please Consider Login To Your Account To Check The Pinding Requests.</p>
    </div>
</body>

</html>
