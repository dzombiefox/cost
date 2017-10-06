
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  return view('auth/login');
});

Route::GET('/teso',function(){

	
});
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('admin/items', 'admin\\ItemsController');

Route::resource('admin/sizes', 'admin\\SizesController');
Route::resource('admin/formulas', 'admin\\FormulasController');
Route::resource('/tes','HomeController@tes');
Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('admin/status', 'admin\\StatusController');
Route::resource('admin/colors', 'admin\\ColorsController');
Route::resource('admin/densitys', 'admin\\DensitysController');
Route::resource('admin/types', 'admin\\TypesController');
Route::resource('admin/brands', 'admin\\BrandsController');
Route::resource('admin/options', 'admin\\OptionsController');
Route::resource('admin/motifs', 'admin\\MotifsController');
Route::resource('admin/rollers', 'admin\\RollersController');
Route::resource('admin/cost-items', 'admin\\CostItemsController');
Route::resource('admin/periodes', 'admin\\PeriodesController');
Route::resource('admin/bodys', 'admin\\BodysController');
Route::resource('admin/dbodys', 'admin\\DbodysController');

Route::get('getDetailBody/{id}/{periode}/{year}','admin\\BodysController@getDetail');
Route::get('getDetailRoBody/{id}/{periode}/{year}','admin\\BodysController@getDetailRo');
//Route::res
Route::resource('admins/all','admin\\BodysController@saveAll');

Route::resource('aluminas/all','admin\\AluminasController@saveAll');
Route::resource('engobes/all','admin\\EngobesController@saveAll');
Route::resource('glazes/all','admin\\GlazesController@saveAll');
Route::resource('drops/all','admin\\DropsController@saveAll');
Route::resource('pastas/all','admin\\PastasController@saveAll');
Route::resource('inks/all','admin\\InksController@saveAll');

Route::resource('admin/aluminas', 'admin\\AluminasController');
Route::resource('admin/daluminas', 'admin\\DaluminasController');
Route::resource('admin/engobes', 'admin\\EngobesController');
Route::resource('admin/dengobes', 'admin\\DengobesController');
Route::resource('admin/glazes', 'admin\\GlazesController');
Route::resource('admin/dglazes', 'admin\\DglazesController');
Route::resource('admin/drops', 'admin\\DropsController');
Route::resource('admin/ddrops', 'admin\\DdropsController');
Route::resource('admin/pastas', 'admin\\PastasController');
Route::resource('admin/dpastas', 'admin\\DpastasController');
Route::resource('admin/inks', 'admin\\InksController');
Route::resource('admin/dinks', 'admin\\DinksController');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
/* route for table json*/
//Route::resource('admin/item/itemJson','admin\\ItemsController@itemJson');
Route::resource('admin/finishs', 'admin\\FinishsController');
Route::resource('admin/finks', 'admin\\FinksController');
Route::resource('admin/frollers', 'admin\\FrollersController');
Route::resource('admin/fpastas', 'admin\\FpastasController');
Route::resource('admin/lines', 'admin\\LinesController');
Route::resource('admin/pcosts', 'admin\\PcostsController');
Route::resource('admin/prices', 'admin\\PricesController');
Route::post('/copy','admin\\PricesController@copy');


Route::resource('admin/reportAll','admin\\FinishsController@reportAll');