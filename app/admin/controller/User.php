<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\Db;

class User extends BaseController
{
    //获取
    public function get()
    {
        //测试 .env中 DB_PREFIX 是否配置成功。
        //注：此时必须使用 name， table 不能识别默认前缀
        //Db::name('user')->select();//等效于  Db::table('tp_user')
        //return Db::getLastSql();//网页显示：SELECT * FROM `tp_user`，可见“tp_”已经自动添加完成


        //$user = Db::table('user')->select();//返回值为 Collection
        $user = Db::table('tp_user')->where('id', 1)->find();
        //return Db::getLastSql();// 网页显示： SELECT * FROM `user` WHERE `id` = 1 LIMIT 1
        //$user = Db::table('tp_user')->select();//->toArray()
        //halt($user);//查看返回值类型


        $user = Db::table('tp_user')->where('id', 1)->value("name");
        $user = Db::table('tp_user')->where('age', 14)->column("name", "id");
        $user = Db::table('tp_user')->where('age', 14)->column("name,age");
        //return json($user);

        //批处理
//        Db::name('user')->chunk(2, function ($users) {
//            foreach ($users as $user) {
//                dump($user);
//            }
//            echo 1;
//        });
        //return Db::getLastSql();
        /*
        结果: SELECT * FROM `tp_user` WHERE `id` > 4 ORDER BY `id` ASC LIMIT 2
        可见 chunk 底层是通过 LIMIT 控制批处理数量的, 因此 chunk 不能直接用于前端访问, 会导致超时!
         */


        //游标查询 - 另一种大数据处理方式
        $users = Db::name("user")->cursor();
        foreach ($users as $user) {
            dump($user);
        }
    }

    //添加 insert/strict/replace/insertGetId/insertAll/insertAll+limit
    public function add()
    {
        $data = [
            "name" => "赵六",
            "age" => 13,
            "gender" => "女",
            "detail" => "xxx"
        ];
        //INSERT INTO `tp_user` SET `name` = '赵六' , `age` = 13 , `gender` = '女' , `detail` = 'xxx'
        //strict(false) : 当"detail"错写为"detailaa"时会报错: 数据表字段不存在:[detailaa]. 强行新增抛弃不存在的字段数据,忽略异常
        //return Db::name("user")->strict(false)->insert($data);//成功1失败0

        $data = [
            "id" => 5,
            "name" => "赵六",
            "age" => 13,
            "gender" => "女",
            "detail" => "xxx"
        ];
        //REPLACE INTO `tp_user` SET `id` = 5 , `name` = '赵六' , `age` = 13 , `gender` = '女' , `detail` = 'xxx'
        //SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '6' for key 'PRIMARY'
        //主键冲突, 使用 replace() , 成功则返回2
        //return Db::name("user")->replace()->insert($data);//insertGetId 插入并返回主键id

        $data = [
            [
                "id" => 9,
                "name" => "酒神",
                "age" => 17,
                "gender" => "男",
                "detail" => "好酒"
            ],
            [
                "id" => 10,
                "name" => "石头",
                "age" => 16,
                "gender" => "女",
                "detail" => "真硬"
            ]
        ];
        //return Db::name("user")->insertAll($data);//成功返回影响行数, 插入了两条数据就返回2
        //添加数量大时,通过limit控制每次写入最多100条
        return Db::name("user")->replace()->limit(100)->insertAll($data);
    }

    //todo 2023年12月13日 16:55:12 13

    //自定义路由
    public function read($id)
    {
        return 'uid = ' . $id;
    }

    public function hello()
    {
        return 'hello user';
    }
}