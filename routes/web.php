<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::view('/side', 'sidebar');

Route::get('/', function () {

    return view('dashboard');
});

Route::get('campaignfetch', [App\Http\Controllers\AddItemController::class, 'fetch']);
Route::post('/additem/{id}', [App\Http\Controllers\AddItemController::class, 'store']);
Route::get('/campaign_items/{id}/{ci_id?}', [App\Http\Controllers\AddItemController::class, 'show']);
Route::get('/item/{id}', [App\Http\Controllers\ItemsDetailsController::class, 'show']);
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'show']);
Route::post('/contacts', [App\Http\Controllers\ContactsController::class, 'store']);
Route::put('/campaignupdate/{id}', [App\Http\Controllers\AddItemController::class, 'update']);
Route::get('/delete/{id}', [App\Http\Controllers\AddItemController::class, 'delete']);
Route::get('/campaigns', [App\Http\Controllers\CampaignController::class, 'show']);
Route::post('/addcampaign', [App\Http\Controllers\CampaignController::class, 'store']);
Route::get('/campaign/edit/{id}', [App\Http\Controllers\CampaignController::class, 'edit']);
Route::get('/campaign/delete/{id}', [App\Http\Controllers\CampaignController::class, 'delete']);
Route::put('/campaign/update/{id}', [App\Http\Controllers\CampaignController::class, 'update']);
