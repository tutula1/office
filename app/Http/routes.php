<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */
    Route::get('language/{locale}', function (\Illuminate\Http\Request $request, $locale) {
        if($locale != 'en' && $locale != 'vi'){
            $locale = 'vi';
        }
        if($request->user()){
            $user_id = $request->user()->id;
            if ($user_id){
                \App\Config::where('user_id', $user_id)->where('key', 'defaultLanguage')->update([
                    'value' => $locale,
                ]);
            }
        }
        \Session::put('locale', $locale);
        App::setLocale($locale);
        return redirect()->back();
    });
    Route::group(['middleware' => 'default'], function() {
        Route::get('error', 'PagesController@error');
        Route::group(['middleware' => 'acl'], function() {
            Route::group(['permission' => 'home'], function(){
                Route::resource('/', 'HomeController');
            });
            Route::group(['permission' => 'users'], function(){
                Route::resource('users', 'UsersController');
            });
            Route::group(['permission' => 'roles'], function(){
                Route::resource('roles', 'RolesController');
            });

            Route::group(['permission' => 'permissions'], function(){
                Route::resource('permissions', 'PermissionsController');
            });

            Route::group(['prefix' => 'jobs'], function(){
                Route::group(['permission' => 'jobs'], function(){
                    Route::resource('jobs', 'JobsController');
                });
                Route::group(['permission' => 'jobs.groups'], function(){
                    Route::resource('groups', 'JobsGroupsController');
                });
            });
            Route::group(['permission' => 'languages'], function(){
                Route::resource('languages', 'LanguagesController');
            });
            Route::group(['permission' => 'cache'], function(){
                Route::resource('cache', 'CacheController');
            });
            Route::group(['permission' => 'configs'], function(){
                Route::resource('configs', 'ConfigsController');
            });
        });
        Route::controllers([
            'auth' => 'Auth\AuthController',
            'password' => 'Auth\PasswordController',
        ]);
    });
