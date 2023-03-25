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



Route::get('/', function () {

    return view('dashboard');

});

Route::get('campaignfetch', [App\Http\Controllers\AddItemController::class, 'fetch']);
Route::post('/additem/{id}', [App\Http\Controllers\AddItemController::class, 'store']);

Route::get('/campaign_items/{id}/{ci_id?}',  [App\Http\Controllers\AddItemController::class, 'show']);

Route::get('/item/{id}', [App\Http\Controllers\ItemsDetailsController::class, 'show']);

// Route::post('/additemdetails', [App\Http\Controllers\ItemsDetailsController::class, 'store']);

// Route::get('/item/{id}', [App\Http\Controllers\AddItemController::class, 'store']);
Route::get('/contacts', function () {
    $items = DB::table('emails')->select('id', 'email')->get();
    return view('contacts', compact('items'));
});
Route::post('/contacts', [App\Http\Controllers\ContactsController::class, 'store']);

Route::put('/campaignupdate/{id}', [App\Http\Controllers\AddItemController::class, 'update']);

Route::get('/campaigns', function () {
    $items = DB::table('campaigns')->select('id', 'name', 'created_at', 'updated_at')->get();
    return view('campaigns', compact('items'));
});
Route::post('/addcampaign', [App\Http\Controllers\CampaignController::class, 'store']);

Route::view('/side', 'sidebar');