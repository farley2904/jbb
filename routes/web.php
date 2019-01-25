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

Route::group(['prefix' => Jbb\Http\Middleware\LocaleMiddleware::getLocale()], function(){

    Route::resource('/', 'IndexController', ['only' => 'index', 'names' => ['index' => 'home']]);

    Route::get('news', 'ArticlesController@index')->name('news');

    Route::resource('school', 'SchoolController', ['parametres' => ['articles' => 'alias']]);

    Route::get('services', 'ServicesController@index')->name('services');

    Route::match(['get', 'post'], 'about_us', ['uses' => 'AboutusController@index']);

    Route::get('portfolio/{filter_alias}', ['uses' => 'PortfolioController@index', 'as' => 'portfoliosFilter'])->where('filter_alias', '[a-z_]+');

    Route::match(['get', 'post'], 'contacts', ['uses' => 'ContactsController@index', 'as' => 'contacts']);

});

// auth
Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login',['uses'=>'Auth\LoginController@login','as' => 'login']);
Route::match(['get', 'post'],'logout',['uses'=>'Auth\LoginController@logout','as'=>'logout']);

//admin
Route::group(['prefix'=>'admin','middleware' => 'auth','as'=>'admin.'],function(){

    Route::get('/',['uses'=>'Admin\IndexController@index','as'=>'']);
    
    Route::resource('articles','Admin\ArticlesController');

    Route::resource('services','Admin\ServicesController');

    Route::resource('users','Admin\UsersController');

    Route::resource('permissions','Admin\PermissionsController');
    
    Route::resource('menus','Admin\MenusController');
    
    Route::resource('information','Admin\InformationController');

});


//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], Jbb\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    } 
    
    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != Jbb\Http\Middleware\LocaleMiddleware::$mainLanguage){ 
        array_splice($segments, 1, 0, $lang); 
    }

    //формируем полный URL
    $url = Request::root().implode("/", $segments);
    
    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){    
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url); //Перенаправляем назад на ту же страницу                            

})->name('setlocale');

Route::get('clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect()->back();
});

// Route::get('create', function() {
    // $services = Jbb\Service::all();
    // foreach ($services as $service) {
    //     $service_tr = new Jbb\ServiceTranslation;
    //     $service_tr->id = $service->id;
    //     $service_tr->name = $service->name;
    //     $service_tr->locale = 'ru';
    //     $service_tr->service_id = $service->id;
    //     $service_tr->save();
    // }
// });
