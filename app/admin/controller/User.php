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

    //新增
    //insert/strict/replace/insertGetId/insertAll/insertAll+limit
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

        //REPLACE INTO `tp_user` (`id` , `name` , `age` , `gender` , `detail`) VALUES ( 9,'酒神',17,'男','好酒' ) , ( 10,'石头',16,'女','真硬' )
        return Db::name("user")->replace()->limit(100)->insertAll($data);//没有数据是返回2,插入过一次再次插入为replace
    }

    //更新
    //update+where主键/update+$data包含主键/exp/inc/dec/setInc/setDec/raw/save
    public function update()
    {
        //1. 要修改的数据字段
//        $data = [
//            "detail" => "好酒update " . date('Y年m月d日 H:i:s')
//        ];
//        return Db::name("user")->where("id", 9)->update($data);

        //2. 此时不需要加 where("id", 9)
//        $data = [
//            "id" => 9,
//            "detail" => "好酒update222 " . date('Y年m月d日 H:i:s')
//        ];
//        return Db::name("user")->update($data);

        //3. update同时需要执行SQL函数操作 如:让detail字段内的英文显示大写
        //return Db::name("user")->where("id",9)->exp("detail", "UPPER(detail)")->update();

        //4. inc 增 ; dec 减 ; setInc("age", 2, 600) setDec()
        //return Db::name("user")->where("id", 9)->inc("age", 2)->dec("age", 3)->update();

        //5. raw 设置某个字段的特殊需求
        //UPDATE `tp_user` SET `detail` = UPPER(detail) , `age` = age -2 WHERE `id` = 9
//        return Db::name("user")->where("id", 9)->update([
//            "detail" => Db::raw("UPPER(detail)"),
//            "age" => Db::raw("age -2")
//        ]);

        //6. save 两种处理流程: 1.$data中有主键, 执行修改操作; 2.否则, 新增
        $data = [
            "id" => 9,
            "detail" => "好酒 update save " . date('Y年m月d日 H:i:s')
        ];
        return Db::name("user")->save($data);
    }

    //删除
    public function delete()
    {
        //1. 根据主键删除
        //return Db::name("user")->delete(10);

        //2. 根据主键删除多条0
        //return Db::name("user")->delete([9, 10]);

        //3. 正常情况, 使用 where 来删除
        return Db::name("user")->where("id", 9)->delete();
    }

    //查询
    //使用 whereLike whereIn 等效率更高
    public function query()
    {
        $user = Db::name("user")->where("name", "王五")->select();
        $user = Db::name("user")->where("id", ">", 5)->select();

        //SELECT * FROM `tp_user` WHERE `name` LIKE '王%'
        //SELECT * FROM `tp_user` WHERE `name` NOT LIKE '王%'
        $user = Db::name("user")->where("name", "like", "王%")->select();
        $user = Db::name("user")->whereLike("name", "王%")->select();
        $user = Db::name("user")->whereNotLike("name", "王%")->select();

        //whereIn  whereNotIn
        //SELECT * FROM `tp_user` WHERE `id` IN (1,3)
        $user = Db::name("user")->where("id", "in", [1, 3])->select();

        //null ; not null
        //SELECT * FROM `tp_user` WHERE `detail` IS NULL
        $user = Db::name("user")->where("detail", "null")->select();
        //$user = Db::name("user")->where("detail", "not null")->select();

        //exp whereExp
        //SELECT * FROM `tp_user` WHERE ( `id` < 8 and `id` > 3 )
        $user = Db::name("user")->where("id", "exp", " < 8 and `id` > 3")->select();
        $user = Db::name("user")->whereExp("id", " < 8 and `id` > 3")->select();
        $user = Db::name("user")->field("id,name")->whereExp("id", " < 8 and `id` > 3")->select();

        //SELECT COUNT(`detail`) AS think_count FROM `tp_user`
        $user = Db::name("user")->count("detail");//max min avg sum ...
        //return json($user);
        return $user;
    }

    //关联查询
    public function link()
    {
        //1. 常规写法
        $user = Db::name("user")->where("age", ">", 14)
            ->where("gender", "男")// "=" 可以省略
            ->select();

        //2.索引数组方式, 二维数组
        //SELECT * FROM `tp_user` WHERE `age` > 14 AND `gender` = '男'
        $user = Db::name("user")->where([
            ["age", ">", 14],
            ["gender", "=", "男"]
        ])->select();

        //3.关联数组, 一维数组。 "="关系, 可以直接使用
        //SELECT * FROM `tp_user` WHERE `age` = 14 AND `gender` = '男'
        $user = Db::name("user")->where([
            "age" => 14,
            "gender" => "男"
        ])->select();

        //4.搜索条件独立管理, 这里=号写全
        //SELECT * FROM `tp_user` WHERE `age` > 14 AND `gender` = '男'
        $map[] = ["age", ">", 14];
        $map[] = ["gender", "=", "男"];
        //dump($map);
        $user = Db::name("user")->where($map)->select();

        //return Db::getLastSql();
        //return json($user);
        return $user;
    }

    //[重点]拼装高级查询
    public function adv()
    {
        //SELECT * FROM `tp_user` WHERE ( `name` LIKE '%王%' OR `detail` LIKE '%王%' ) AND ( `id` > 0 AND `createtime` > '0' )
        $user = Db::name("user")->where("name|detail", "like", "%王%")
            ->where("id&createtime", ">", 0)
            ->select();

        //SELECT * FROM `tp_user` WHERE `age` > 14 AND `detail` LIKE '%我%'
        $user = Db::name("user")->where([
            ["age", ">", 14],
            ["detail", "like", "%我%"],
        ])->select();

        //SELECT * FROM `tp_user` WHERE `gender` = '男' AND ( `age` >=15 and id<5 ) AND `detail` LIKE '%我%'
        //条件字符串复杂拼装: Db::raw(">=15 and id<5")
        $user = Db::name("user")->where([
            ["gender", "=", "男"],
            ["age", "exp", Db::raw(">=15 and id<5")],
        ])
            ->where("detail", "like", "%我%")
            ->select();

        //推荐用变量代替, SQL语句同上
        /*
        注: $map[] 和 $map 是有区别的。
        $map[] 是一个数组变量，在使用时会将值附加到数组的末尾;
        $map 则是一个普通的变量名，可以用来存储任何类型的数据，比如字符串、整数等。
         */
        //SELECT * FROM `tp_user` WHERE `gender` = '男' AND ( `age` >=15 and id<5 ) AND `detail` LIKE '%我%'
        $map = [
            ["gender", "=", "男"],
            ["age", "exp", Db::raw(">=15 and id<5")],
        ];
        $map[] = ["detail", "like", "%我%"];//而不是: $map = ["detail", "like", "%我%"];
        $user = Db::name("user")->where($map)->select();

        //如果, 条件中多次出现一个字段, 并且需要 OR 来左右筛选, 可以用 whereOr
        $map1 = [
            ["name", "like", "%王%"],
            ["detail", "=", null]
            ,];
        $map2 = [
            ["gender", "=", "女"],
            ["detail", "exp", Db::raw("is not null")]
        ];
        //SELECT * FROM `tp_user` WHERE ( `name` LIKE '%王%' AND `detail` IS NULL ) OR ( `gender` = '女' AND ( `detail` is not null ) )
        $user = Db::name("user")->whereOr([$map1, $map2])->select();

        //return Db::getLastSql();
        //return json($user);
        return $user;
    }

    //todo 2024年1月18日 15:41:25 18 数据库 ; 31 路由 6:00
    //模型的定义方式
    public function xxx()
    {

    }

    //自定义路由00
    public function read($id)
    {
        return 'uid = ' . $id;
    }

    public function hello($str = 'sss')
    {
        return 'hello user: ' . $str;
    }
}