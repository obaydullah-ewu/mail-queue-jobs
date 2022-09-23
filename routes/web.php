<?php

use App\Jobs\TestEmailJob;
use App\Mail\TestMail2;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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


Route::get('test-mail', function(){
    $email = 'zainiklab.obaydullah@gmail.com';
    dispatch(new TestEmailJob($email));
    return response()->json(['message'=>'Mail Send Successfully from queue!!']);
});

Route::get('test-mail-2', function(){
    $details['email'] = 'zainiklab.obaydullah@gmail.com';
    Mail::to($details['email'])->send(new TestMail2());
    return response()->json(['message'=>'Mail Send Successfully from basic mail!!']);
});
