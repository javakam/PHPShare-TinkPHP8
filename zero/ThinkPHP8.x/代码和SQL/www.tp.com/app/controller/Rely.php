<?php
namespace app\controller;
//use app\Request;
//use think\facade\Request;
use app\BaseController;
use app\validate\User;
use think\exception\ValidateException;
use think\facade\Cache;
use think\facade\Cookie;
use think\facade\Session;
use think\facade\Validate;

class Rely extends BaseController
{
//    protected $request;
//
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }

    public function index()
    {
        //return $this->request->get("id");
        //return Request::get("id");
        //return request()->get("id");
        //return $this->request->url();
        //return $this->request->host();
        //return $this->request->port();

        //echo $this->request->has("id", "get");
        //echo $this->request->param("id", "无");
        //echo $this->request->param("name");
        //echo $this->request->param("id/d");
        //halt($this->request->param());
        //halt($this->request->only(["id","name"]));
        echo input("get.id");

    }

    public function create()
    {
        return view();
    }

    public function save()
    {
        echo request()->method();
        //echo request()->isPost();
        echo request()->isPut();
        echo input("post.name");
    }

    public function view()
    {
        //return response(123, 201);
        //return response(123)->code(200);
        return redirect("/", 303);
    }

    public function sess()
    {
        Session::set("user", "Mr.Lee");
        echo Session::get("user");
        echo Session::get("bcd", "无");
        dump(Session::all());
        //Session::delete("user");
        echo Session::has("user");
        //$this->request->session()
        //request()->session()

        echo session("user");
    }

    public function setC()
    {
        Cookie::set("user", "Mr.Lee", 3600);

    }

    public function getC()
    {
        echo Cookie::get("user");
    }

    public function cache()
    {
        Cache::set("user", "Mr.Lee", 3600);
        echo Cache::get("user");

        Cache::set("num", 1);
        Cache::inc("num");
        echo Cache::get("num");

        Cache::set("arr", [1, 2, 3]);
        Cache::push("arr", 4);
        dump(Cache::get("arr"));
    }

    public function vali()
    {
//        try {
//            //post => name,email
//            validate(User::class)->scene("edit")->batch(true)->check([
//                "name"  =>  "",
//                "email" =>  "123163.com"
//            ]);
//        } catch (ValidateException $e) {
//            dump($e->getError());
//        }

//        // 规则
//        $validate = Validate::rule([
//                "name|用户名"  =>  "require|max:20",
//                "email|邮箱" =>  "email"
//        ]);
//
//        // 验证
//        $result = $validate->batch(true)->check([
//                "name"  =>  "",
//                "email" =>  "123163.com"
//        ]);
//
//        // 判断输出
//        if (!$result) {
//            dump($validate->getError());
//        }

       // Validate::isNumber("abc");



    }



}