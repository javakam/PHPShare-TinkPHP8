<?php

namespace app\admin\controller;

class Error
{
    public function __call(string $name, array $arguments)
    {
        //return $this->error('404');
        return "当前控制器不存在！" . $name . " ; " . json_encode($arguments);//$name 为默认执行方法名;$arguments 为参数
    }
}