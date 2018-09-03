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

// Route::get('/', function () {
//     return view('index');
// });

//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('register', 'RegisterController@showForm');
Route::post('register', 'AuthController@registerValidation');
Route::get('login', 'LoginController@showForm');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@login');
Route::get('dashboard', 'DashboardController@showDash');

//Profile routing
Route::get('profile', 'ProfileController@showForm');
Route::post('addProfile', 'ProfileController@addProfile');
Route::get('getRegion', 'GetRegularDataController@getRegion');
Route::post('getState', 'GetRegularDataController@getState');
Route::post('getCity', 'GetRegularDataController@getCity');

//Geografic positions routing
Route::get('region', 'RegionController@getData');
Route::get('state', 'StateController@getData');
Route::get('city', 'CityController@getData');

//Dashboard routing
Route::get('getUserData', 'DashboardController@getUserData');
Route::get('getUserVisit', 'DashboardController@getUserVisit');
Route::delete('deleteUserVisit/{visit}', 'VisitController@deleteUserVisit');
// Route::get('getCurrentUser', 'DashboardController@getCurrentUser');

//Options routing
Route::get('options', 'OptionController@showForm');
// Route::get('options/brands', 'OptionController@showBrands');
    //-brands
Route::get('options/brands', 'BrandController@showBrands');
Route::get('getAllData', 'BrandController@getAllData');
Route::post('brandUpdateData', 'BrandController@updateData');
Route::post('brandDeleteData', 'BrandController@deleteData');
Route::post('brandAddData', 'BrandController@addData');
Route::get('unit', 'BrandController@createUnit');
    //-subbrands
Route::post('filteredSubBrand', 'SubBrandController@filteredSubBrand');
Route::post('filteredSubBrandDel', 'SubBrandController@filteredSubBrandDel');
Route::get('options/subbrands', 'SubBrandController@showForm');
// Route::get('getBrandsData', 'SubBrandController@getBrandsData');
Route::get('getBrand', 'GetRegularDataController@getBrand');
// Route::get('getSubbrandsData', 'SubBrandController@getSubbrandsData');
Route::post('getSubBrand', 'GetRegularDataController@getSubBrand');
Route::post('SubbrandAddData', 'SubBrandController@add');
Route::post('SubbrandUpdateData', 'SubBrandController@update');
Route::post('SubbrandDeleteData', 'SubBrandController@delete');
    //-box-view
Route::get('options/box', 'ProductBoxViewController@showForm');
Route::post('upload', 'ProductBoxViewController@upload');
Route::post('delete', 'ProductBoxViewController@delete');
Route::get('getBrand', 'GetRegularDataController@getBrand');
Route::post('getSubBrand', 'GetRegularDataController@getSubBrand');
Route::post('getSubBrandDel', 'GetRegularDataController@getSubBrandDel');
Route::post('getBoxView', 'ProductBoxViewController@getBoxView');
// Route::get('getBrandsData', 'ProductBoxViewController@getBrandsData');
// Route::get('getSubBrandsData', 'ProductBoxViewController@getSubBrandsData');
// Route::get('getBoxData', 'ProductBoxViewController@getBoxData');
// Route::get('getSubBrandsData', 'ProductBoxViewController@getSubBrandsData');
    //-region
Route::get('options/region', 'RegionController@showForm');
Route::get('getData', 'RegionController@getData');
Route::post('regionAddData', 'RegionController@regionAddData');
Route::post('regionUpdateData', 'RegionController@regionUpdateData');
Route::post('regionDeleteData', 'RegionController@regionDeleteData');
    //-profile_view
Route::get('profileView', 'ProfileController@showProfileView');
Route::get('getAllUserData', 'ProfileController@getAllUserData');
Route::get('getAuthUserData', 'ProfileController@getAuthUserData');
    //-state
Route::get('options/state', 'StateController@showForm');
Route::get('getStateData', 'StateController@getStateData');
Route::get('getRegionData', 'StateController@getRegionData');
Route::post('stateAddData', 'StateController@stateAddData');
Route::post('stateUpdateData', 'StateController@stateUpdateData');
Route::post('stateDeleteData', 'StateController@stateDeleteData');
Route::post('filteredState', 'StateController@filteredState');
Route::post('filteredStateDel', 'StateController@filteredStateDel');
    //-city
Route::get('options/city', 'CityController@showForm');
Route::get('getRegion', 'GetRegularDataController@getRegion');
Route::post('filteredRegionForCity', 'CityController@filteredRegionForCity');
    //-workbench
Route::get('workbench','WorkbenchController@showForm');
Route::get('getDealer', 'GetRegularDataController@getDealer');
Route::post('saveVisit', 'VisitController@saveVisit');
    //-line
Route::get('line', 'LineController@showForm');
Route::get('getBrand', 'GetRegularDataController@getBrand');
Route::get('getSubBrand', 'GetRegularDataController@getSubBrand');
Route::post('getBox', 'LineController@getBox');
    //-view
Route::get('dashboard/view/{visit}', 'VisitController@getVisit');
Route::post('getCurrentVisit', 'VisitController@getCurrentVisit');


