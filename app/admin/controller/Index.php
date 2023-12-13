<?php

namespace app\admin\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index()
    {
        return '<style>*{ padding: 0; margin: 0; }</style><iframe src="https://www.thinkphp.cn/welcome?version=' . \think\facade\App::version() . '" width="100%" height="100%" frameborder="0" scrolling="auto"></iframe>';
    }

	// http://tp.com/index.php/admin/Index/hello
    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,admin' . $name;
    }
	
	// http://tp.com/admin/Index/test
	 public function test()
    {
        return 'test admin';
    }
}
