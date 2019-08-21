<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//HOME ROUTE ==============================================================================================================================
Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('/pages/dashboard');
});
//HOME ROUTE END===========================================================================================================================




//AUTH ROUTES =============================================================================================================================
Route::get('/login', 'Auth\LoginController@index');
Route::post('/submitlogin', 'Auth\LoginController@submitLogin');
Route::get('/apply', 'Auth\RegisterController@apply');
Route::post('/submitapplication', 'Auth\RegisterController@submitapplication');
Route::post('/storeNewPassword/{id}', 'Auth\LoginController@storeNewPassword');
Route::get('/logout', 'Auth\LoginController@logUserOut');
//AUTH ROUTES END==========================================================================================================================




//USER ROUTES =============================================================================================================================
Route::resource('users', 'UsersController');
Route::get('/userprofile', 'UsersController@profile');
//USER ROUTES END==========================================================================================================================




//CATEGORY ROUTES =========================================================================================================================
Route::resource('categories', 'CategoriesController');
Route::post('/addcategory/{id}', 'CategoriesController@addcategory');
Route::get('/categorydetails/{id}', 'CategoriesController@categorydetails');
Route::post('/addsubcateg/{id}', 'CategoriesController@addsubcateg');
//APIS
//Route::get('/categories', 'CategoriesController@categoriesapi');
//CATEGORY ROUTES END======================================================================================================================


//BRAND ROUTES ============================================================================================================================
Route::resource('brands', 'BrandsController');
Route::get('/pendingbrands', 'BrandsController@pendingbrands');
//BRAND ROUTES END ========================================================================================================================

//RANGE ROUTES ============================================================================================================================
Route::resource('ranges', 'RangesController');
//RANGE ROUTES END ========================================================================================================================

//STYLE ROUTES ============================================================================================================================
Route::resource('styles', 'StylesController');
//STYLE ROUTES END=========================================================================================================================

//ATTRIBUTE ROUTES ========================================================================================================================
Route::resource('attributes', 'AttributesController');
//ATTRIBUTE ROUTES END=====================================================================================================================

//OCCASION ROUTES =========================================================================================================================
Route::resource('occasions', 'OccasionsController');
//OCCASION ROUTES END =====================================================================================================================

//PRODUCT ROUTES ==========================================================================================================================
Route::resource('products', 'ProductsController');
//PRODUCT ROUTES END=======================================================================================================================