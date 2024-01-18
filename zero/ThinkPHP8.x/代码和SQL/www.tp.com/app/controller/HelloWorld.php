<?php
namespace app\controller;

class HelloWorld
{
    public function index()
    {
        return "hello world！";
    }

    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }

    public function test()
    {
        return "test";
    }

    public function details($id, $uid = 1)
    {
        return "details:".$id.$uid;
    }

    public function getUrl()
    {
        //return url("HelloWorld/test");
        //return url("HelloWorld/details", ["id"=>5]);
        //return url("de", ["id"=>5]);
        //return url("de", ["id"=>5])->domain(true);
        return url("de", ["id"=>5])->domain("www.ycku.com");

    }
}