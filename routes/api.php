<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EventController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/events', [EventController::class, 'index']);

Route::post('/events', [EventController::class, 'store']);

Route::post('/events/{event}/tickets', [EventController::class, 'purchase']);

Route::get('/events/{id}', [EventController::class, 'showEventWithTickets']);

