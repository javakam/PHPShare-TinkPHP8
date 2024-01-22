<?php

namespace app\admin\controller;

use app\admin\model\User;
use app\BaseController;

class TestUser extends BaseController
{
    public function index()
    {
        //测试 model\User.php 是否与数据库成功绑定
        return User::select();
    }

    //todo 2024年1月19日 14:44:26  19 模型的新增和删除
    public function add()
    {
        $user = new User;
        $user->name = '李白';
        $user->age = 18;
        $user->gender = "男";
        $user->detail = "床前明月光，好诗！";

        //成功返回1, 失败抛异常, 其它看手册
        //插入数据时, 如果有create_time/update_time字段, 框架会自动赋值!!!
        echo $user->save();
    }
}