<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP8!';
});

//http://tp.com/admin/index/hello/aaa  ->   http://tp.com/hello/aaa
Route::get('hello/:name', 'index/hello');

//自定义路径
//Route::rule('custom-path', 'app\admin\controller\UserController@customMethod')->app('admin');
//Route::rule('user/:id', function ($id) {
// 处理请求逻辑
//})->app('admin');

//http://tp.com/admin/user/read?id=123   -> http://tp.com/user/123
Route::rule('user/:id', 'app\admin\controller\User@read')->app('admin');
//http://tp.com/admin/user/hello   ->  http://tp.com/hello2
Route::rule('hello2/:str', 'app\admin\controller\User@hello')->app('admin');
//http://tp.com/admin/redis/redis   ->  redis
Route::rule('redis', 'app\admin\controller\Redis@redis');
