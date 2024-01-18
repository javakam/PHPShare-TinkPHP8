<?php
declare (strict_types = 1);
namespace app\validate;
use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        "name|用户名"  =>  "require|max:20|checkName:李炎恢",
        "email|邮箱" =>  "email"
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        "name.require"  =>  "姓名必须写！",
        "email.email"   =>  "电子邮件认真的吗？"
    ];

    // 自定义规则方法
    protected function checkName($value, $rule)
    {
        if ($value == $rule) {
            return "用户名是违禁词！";
        } else {
            return true;
        }
    }

    // 场景验证
    protected $scene = [
        "insert"    =>  ["name", "email"],
        "edit"      =>  ["email"]
    ];

}
