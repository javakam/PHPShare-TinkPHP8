<?php
namespace app\controller;
use app\BaseController;

class ViewPage extends BaseController
{
    public function index()
    {
//        return View::engine("php")->fetch("index", [
//            "name"  =>  "ThinkPHP8"
//        ]);
        return view("index", [
            "name"  =>  "ThinkPHP8"
        ]);
    }

    public function save()
    {
        return $this->request->post("username");
    }
}