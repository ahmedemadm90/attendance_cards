<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VpController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CardRequestController;
use App\Http\Controllers\EmployeeController;
use App\Mail\NewEmployeeMail;
use App\Mail\RequestNewCardMail;
use App\Models\CardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('employees', EmployeeController::class);
    Route::prefix('vps')->group(function () {
        Route::get('/index', [VpController::class, "index"])->name('vps.index');
        Route::get('/show/{id}', [VpController::class, "show"])->name('vps.show');
        Route::get('/create', [VpController::class, "create"])->name('vps.create');
        Route::post('/store', [VpController::class, "store"])->name('vps.store');
        Route::get('/edit/{id}', [VpController::class, "edit"])->name('vps.edit');
        Route::post('/update/{id}', [VpController::class, "update"])->name('vps.update');
        Route::any('/delete/{id}', [VpController::class, "destroy"])->name('vps.destroy');
    });
    Route::prefix('areas')->group(function () {
        Route::get('/index', [AreaController::class, "index"])->name('areas.index');
        Route::get('/show/{id}', [AreaController::class, "show"])->name('areas.show');
        Route::get('/create', [AreaController::class, "create"])->name('areas.create');
        Route::post('/store', [AreaController::class, "store"])->name('areas.store');
        Route::get('/edit/{id}', [AreaController::class, "edit"])->name('areas.edit');
        Route::post('/update/{id}', [AreaController::class, "update"])->name('areas.update');
        Route::any('/delete/{id}', [AreaController::class, "destroy"])->name('areas.destroy');
    });
    Route::prefix('requests')->group(function () {
        Route::get('/index', [CardRequestController::class, "index"])->name('requests.index');
        Route::get('/show/{id}', [CardRequestController::class, "show"])->name('requests.show');
        Route::get('/create', [CardRequestController::class, "create"])->name('requests.create');
        Route::post('/store', [CardRequestController::class, "store"])->name('requests.store');
        Route::get('/edit/{id}', [CardRequestController::class, "edit"])->name('requests.edit');
        Route::post('/update/{id}', [CardRequestController::class, "update"])->name('requests.update');
        Route::get('/pending', function () {
            return view('requests.pending');
        })->name('requests.pending');
        Route::get('/approved', function () {
            return view('requests.approved');
        })->name('requests.approved');

        Route::any('/approve/{id}', function (Request $request) {
            $cardRequest = CardRequest::find($request->id);
            if($cardRequest){
                if($cardRequest->admin_approve != 1){
                    $cardRequest->update([
                        'admin_approve'=>1
                    ]);
                    $data = [
                        'request' => $cardRequest
                    ];
                    Mail::send('emails.newrequest', $data, function ($message) use ($request) {
                        $message->to('abdelrahman.hashem@cemex.com');
                        $message->subject('Ahmed Emad Requesting New Access Card');
                    });
                    return redirect(route('requests.index'))->with(['success' => 'Request Approved, Thank You']);
                }else{
                    return redirect(route('requests.index'))->with(['error' => 'This Request Already Approved,']);
                }
            }else{
                return redirect(route('requests.index'))->with(['error'=>'Invaled Request, Please Try again Later']);
            }
        })->name('requests.adminapprove');
        Route::any('/print/{id}', function (Request $request) {
            $cardRequest = CardRequest::find($request->id);
            if ($cardRequest) {
                if ($cardRequest->is_printed != 1) {
                    $cardRequest->update([
                        'is_printed' => 1
                    ]);
                    return redirect(route('requests.index'))->with(['success' => 'Card Printed, Thank You']);
                } else {
                    return redirect(route('requests.index'))->with(['error' => 'This Request Already Printed,']);
                }
            } else {
                return redirect(route('requests.index'))->with(['error' => 'Invalid Request, Please Try again Later']);
            }
        })->name('requests.print');
    });
    // Route::get('newrequest/{id}', function(Request $request){
    //     $mail = 'egysecurity.assiut@cemex.com';
    //     Mail::to($mail)->send(new RequestNewCardMail);
    //     dd('Mail Send Successfully !!');
    // });

});
