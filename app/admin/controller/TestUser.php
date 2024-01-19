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
}