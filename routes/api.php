<?php

use Illuminate\Support\Facades\Route;
use App\Models\Newsletter;

Route::get('/newsletters', function () {
    return Newsletter::all();
});
