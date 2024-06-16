<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainPage;

Route::get('/', [mainPage::class, 'main']);
Route::post('/', [mainPage::class, 'loadlist']);
