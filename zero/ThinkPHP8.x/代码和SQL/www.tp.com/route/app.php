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

//Route::get("think", function ($version) {
//    return "hello, ThinkPHP".$version."!";
//});
//Route::pattern([
//    "id"    =>  "\d+",
//    "uid"   =>  "\d+",
//]);

//Route::rule("details/:id/[:uid]$", "Index/details");
//Route::rule("test", "Index/test");
//Route::rule("/", "Index/index");
//Route::rule("details-<id>-<uid>", "Index/details")->pattern([
//    "id"    =>  "\d+"
//]);

//Route::rule("test", "Index/test")->ext("html")->https();
//Route::rule("test", "Index/test")->denyExt("jpg|png");
//Route::rule("test", "Index/test")->domain("www.tp.com");
//Route::rule("test", "Index/test")->domain("www");
//Route::domain("www", function () {
//    Route::rule("test", "Index/test");
//});

//Route::miss(function () {
//    return "404 MISS";
//});
//Route::miss("Error/miss");

// 路由分组
//Route::group("hw", function () {
//    Route::rule(":id", "HelloWorld/details");
//    Route::rule(":name", "HelloWorld/hello");
//})->ext("html")->pattern(["id"=>"\d+"]);

//Route::group(function () {
//    Route::rule("about", "HelloWorld/test");
//})->ext("html");

//Route::group("hw", function () {
//    Route::rule(":id", "details");
//    Route::rule(":name", "hello");
//})->prefix("HelloWorld/")->ext("html")->pattern(["id"=>"\d+"]);

//Route::rule("test", "HelloWorld/test")->ext("html");
//Route::rule("details/:id", "HelloWorld/details")->name("de");

// 资源路由
//Route::resource("blog","Blog");
//Route::resource("blog","Blog")->vars(["blog"=>"blog_id"]);
//Route::resource("blog","Blog")->only(["index", "read","save"]);
//Route::rest("create", ["GET", "/add", "add"]);
//Route::resource("blog","Blog");

//Route::rule("t/s", "Tk/save")->token();

//Route::rule("/", "Index/index")->middleware(\app\middleware\Auth::class);
//Route::rule("hw", "HelloWorld/index")->middleware([\app\middleware\Auth::class,\app\middleware\Check::class]);
//Route::rule("b", "Blog/index")->middleware(["Auth", "Check"]);

