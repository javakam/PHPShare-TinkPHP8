<?php
namespace app\controller;
use app\BaseController;
use think\helper\Str;

class Index extends BaseController
{
    protected $middleware = [
        "Auth"  =>  ["only" =>  ["hello", "index"]],
        "Check" =>  ["only" =>  ["index"]]
    ];
    public function index()
    {
        //halt(env("DB_HOST"));
        //halt(config("app.default_app"));
        //return public_path();
        return Str::lower("ABCDEFG");
        return "ThinkPHP8.x";
    }

//    public function hello($name = 'ThinkPHP8')
//    {
//        return 'hello,' . $name;
//    }
//
//    public function test()
//    {
//        return "test";
//    }
//
//    public function details($id, $uid = 1)
//    {
//        return "details:".$id.$uid;
//    }

}
