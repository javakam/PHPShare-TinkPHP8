<?php
namespace app\controller;
use app\BaseController;
use think\exception\ValidateException;

class Tk extends BaseController
{
    public function index()
    {
        return view("index", [
            "token" =>  $this->request->buildToken("__token__", "sha1")
        ]);
    }

    public function save()
    {
        //echo $this->request->post("__token__")."<br>";
        //echo session("__token__");

        //No.1
//        $check = $this->request->checkToken("__token__");
//        if ($check === false) {
//            //echo "令牌无效！";
//            throw new ValidateException("令牌无效！");
//        }

        //No.2
    }
}