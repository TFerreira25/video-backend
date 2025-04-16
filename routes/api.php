<?php

use App\Http\Middleware\ApiTokenMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::middleware(ApiTokenMiddleware::class)->group(function () {
    Route::get('/videos', [Controller::class, 'getVideos']);
    Route::get('/videos/{id}', [Controller::class, 'getVideoById']);
});
?>
