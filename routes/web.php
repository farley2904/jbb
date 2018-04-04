<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь вы можете зарегистрировать веб-маршруты для вашего приложения. 
| Эти маршруты загружаются в группе RouteServiceProvider, которая содержит  промежуточную группу "веб". 
|
*/

Route::resource('/', 'IndexController', ['only' => 'index', 'names' => ['index' => 'home']]); //return redirect()->route('home');


Route::match(['get', 'post'], 'about_us', ['uses' => 'AboutusController@index']);
Route::match(['get', 'post'], 'services', ['uses' => 'ServicesController@index']);


// Route::resource('portfolio', 'PortfolioController', ['parametres' => ['portfolios' => 'alias']]);

Route::get('portfolio/{filter_alias?}', ['uses' => 'PortfolioController@index', 'as' => 'portfoliosFilter'])->where('filter_alias', '[a-z_]+');



Route::get('news', 'ArticlesController@index')->name('news');

Route::resource('school', 'SchoolController', ['parametres' => ['articles' => 'alias']]);

Route::resource('services', 'ServicesController', ['parametres' => ['services' => 'alias']]);
// Route::resource('school', 'ServicesController', ['parametres' => ['services' => 'alias']]);


Route::match(['get', 'post'], 'contacts', ['uses' => 'ContactsController@index', 'as' => 'contacts']);


Route::get('personal', function()
{
    return redirect('about_us');
});
Route::get('testimonials', function()
{
    return redirect('about_us');
});



// Route::get('services', function()
// {
//     return 'services';
// });


// Route::resource('about_us', 'AboutusController',['only' => ['index']]);

// Auth::routes();
Route::get('user/{name?}', function ($name = null) {
  return $name;
});

// Route::get('user/{name?}', function ($name = 'John') {
//   return $name;
// });


Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login',['uses'=>'Auth\LoginController@login','as' => 'login']);
// Route::get('logout',['uses'=>'Auth\LoginController@logout');
Route::match(['get', 'post'],'logout',['uses'=>'Auth\LoginController@logout','as'=>'logout']);




//admin
Route::group(['prefix'=>'admin','middleware' => 'auth','as'=>'admin.'],function(){

    Route::get('/',['uses'=>'Admin\IndexController@index','as'=>'']);
    
    Route::resource('articles','Admin\ArticlesController');

    Route::resource('services','Admin\ServicesController');

    Route::get('portfolio', function () {
    return phpinfo();
    })->name('portfolio.index');

    Route::get('users', function () {
    return 'users';
    })->name('users.index');

    Route::resource('permissions','Admin\PermissionsController');
    
    Route::resource('menus','Admin\MenusController');

});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->back();
});