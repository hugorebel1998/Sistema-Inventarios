<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->to(url('home'));
    } else {
        return view('auth.login');
    }
    
});

Auth::routes();