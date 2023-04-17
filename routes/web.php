<?php

use App\Mail\BoostmanMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::view('/side', 'sidebar');

Route::get('/dashboard', function () {

     return view('dashboard');
});

Route::get('campaignfetch', [App\Http\Controllers\AddItemController::class, 'fetch']);
Route::post('/additem/{id}', [App\Http\Controllers\AddItemController::class, 'store']);
Route::get('/campaign_items/{id}/{ci_id?}', [App\Http\Controllers\AddItemController::class, 'show']);
Route::get('/item/{id}', [App\Http\Controllers\ItemsDetailsController::class, 'show']);
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'show']);
Route::post('/contacts', [App\Http\Controllers\ContactsController::class, 'store']);
Route::put('/campaignitem/update/{cp_id}', [App\Http\Controllers\AddItemController::class, 'update']);
Route::get('/delete/{id}', [App\Http\Controllers\AddItemController::class, 'delete']);
Route::get('/campaigns', [App\Http\Controllers\CampaignController::class, 'show']);
Route::post('/addcampaign/{id}', [App\Http\Controllers\CampaignController::class, 'store']);
Route::get('/campaign/edit/{id}', [App\Http\Controllers\CampaignController::class, 'edit']);
Route::get('/campaign/delete/{id}', [App\Http\Controllers\CampaignController::class, 'delete']);
Route::put('/campaign/update/{id}', [App\Http\Controllers\CampaignController::class, 'update']);
Route::get('/contact/edit/{id}', [App\Http\Controllers\ContactsController::class, 'edit']);
Route::get('/contact/delete/{id}', [App\Http\Controllers\ContactsController::class, 'delete']);
Route::put('/contact/update/{id}', [App\Http\Controllers\ContactsController::class, 'update']);
Route::put('/mail/{cp_id}',[App\Http\Controllers\SendMailController::class, 'sendmail']);
//  function () {
//     Mail::to('rabikantsingh24@gmail.com')->send(new BoostmanMail());
// }
