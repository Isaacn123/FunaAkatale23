<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Business;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\UserAuthController;
use App\Http\controllers\CategoryController;
use App\Http\controllers\PostCategory;
use App\Http\controllers\PostSubCategory;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// public Routes 
Route::get('business/search/{name}', [BusinessController::class, 'search']); 
Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);

Route::get('business',[BusinessController::class, 'index']); 
Route::get('category', [PostCategory::class, 'index']); 
Route::get('sub_category/{id}', [PostSubCategory::class, 'index']); 

// protected Routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    // return $request->user();
   
    Route::post('/business', [BusinessController::class, 'store']);
    Route::put('/business/{id}', [BusinessController::class, 'update']); 
    Route::delete('/business/{id}',[BusinessController::class, 'destroy']); 
    Route::post('logout', [UserAuthController::class, 'logout']);
    Route::post('edit_profile', [UserAuthController::class, 'profile_edit']); // done
    Route::post('profile_edit_image', [UserAuthController::class, 'profile_edit_image']); 
    Route::get('/profile',[UserAuthController::class, 'profile']); // done
    Route::post('add_address', [UserAuthController::class, 'add_address']); 

    
   
}); 


// Route::get('/business',[BusinessController::class, 'index']); 

// Route::post('/business', [BusinessController::class, 'store']); 

// Route::resource('business', BusinessController::class);

// Route::get('business/search/{name}', [BusinessController::class, 'search']); 




   // return Business::create([
        // 'name' => 'FLitsDesigns',
        // 'description' => 'my Company Description',
        // 'website' => 'http://www.flitsdesign.com',
        // 'slug' => 'flits-design',
        // 'andress' => 'rubaga Rd kampama uganda',
        // 'email' => 'info@flitsdesign.com',
        // 'contact' => '07738473743',
        // 'categoryName' => 'LimitedCompanys',
        // 'subcategoryName' => 'Designing',
        // 'country' => 'uganda',
        // 'fax' => '0888787878',
        // 'city' => 'kampala',
        // 'image' => 'url/image.png'
        
   // ]);
