<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
/*//1、基本路由
$app->get('foo', function () {
    return 'Hello World';
});
$app->get($uri, $callback);

//2、路由参数
$app->get('user/{id}', function ($id) {
    return 'User '.$id;
});
//3、命名路由
$app->get('profile', [
    'as' => 'profile', 'uses' => 'Controller@index'
]);
$url = route('profile');
$redirect = redirect()->route('profile');
$app->get('user/{id}/profile', ['as' => 'profile', function ($id) {
    //
}]);
$url = route('profile', ['id' => 1]);
//4、路由分组
$app->group(['middleware' => 'auth'], function () use ($app){
    $app->get('/', function ()    {
        // 使用 Auth 中间件
    });

    $app->get('user/profile', function () {
        // 使用 Auth 中间件
    });
});

$app->group(['namespace' => 'Admin'], function() use ($app){
    // 控制器在 "App\Http\Controllers\Admin" 命名空间下

    $app->group(['namespace' => 'User'], function(){
        // 控制器在 "App\Http\Controllers\Admin\User" 命名空间下
    });
});

$app->group(['prefix' => 'admin'], function () use ($app){
    $app->get('users', function ()    {
        // 匹配 "/admin/users" URL
    });
});

$app->group(['prefix' => 'accounts/{account_id}'], function () use ($app){
    $app->get('detail', function ($account_id){
        // 匹配 accounts/{account_id}/detail URL
    });
});*/
$app->get('/', 'Controller@index');
$app->post('auth/login', 'App\Http\Controllers\Auth\AuthController@postLogin');
//Route::get('/', 'HomeController@index');
$app->group(['middleware' => 'jwt.auth'], function($app) {
    $app->post('/', 'App\Http\Controllers\ProjectsController@store');
    $app->put('/{projectId}', 'App\Http\Controllers\ProjectsController@update');
    $app->delete('/{projectId}', 'App\Http\Controllers\ProjectsController@destroy');
});
// index, show这些则不需要
$app->group(['prefix' => 'projects'], function ($app){
        $app->get('/', 'App\Http\Controllers\ProjectsController@index');
        $app->get('/{projectId}', 'App\Http\Controllers\ProjectsController@show');
});