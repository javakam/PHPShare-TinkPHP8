<?php

namespace app\admin\model;

use think\Model;

/*
模型类自动对应数据表，并且有一套自己的命名规则
模型类需要去除表前缀(tp_)，采用驼峰式命名，并且首字母大写:
tp_user(表名) => User(模型类名)
tp_user_type(表名) => UserType(模型类名)
在controller中创建测试类名:
namespace app\admin\controller;
use app\admin\model\User;
use app\BaseController;
class TestUser extends BaseController
{
    public function index()
    {
        return User::select();
    }
}
 */

class User extends Model
{
    //1. 当模型类名不是按照规则对应数据库表名，需要通过成员字段去设置
    //下面两种方式都可以, $table 需要完整表名
    //protected $table = 'tp_user';
    //protected $name = 'user';


    //2. 设置表前缀
    //protected $prefix = 'tp_';
    //protected $tablePrefix = 'tp_';

    //3. 设置数据库连接
    //protected $connection = 'db_config_name';
    //protected $connection = [
    //    // 数据库类型
    //    'type'            => 'mysql',
    //    // 服务器地址
    //    'hostname'        => '127.0.0.1',
    //    // 数据库名
    //    'database'        => 'test',
    //    // 用户名
    //    'username'        => 'root',
    //    // 密码
    //    'password'        => 'root',
    //    // 端口
    //    'hostport'        => '3306',
    //];

    //4. 设置表主键
    //系统默认id为主键名, 如果不是id, 则需要设置
    //protected $pk = 'id';

    //初始化
    //只在第一次实例化的时候执行, 且只执行一次
    protected static function init()
    {
        //echo "初始化!";
    }
}