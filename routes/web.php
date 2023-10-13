<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('hospital.login.index');
});


