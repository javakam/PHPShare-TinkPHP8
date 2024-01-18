<?php
namespace app\controller;
use app\BaseController;
use think\facade\Db;

class UserBak extends BaseController
{
    public function index()
    {
        //return "用户！";
        //return $this->app->getBasePath();
        return $this->request->action();
    }

    public function login()
    {
        return "登录成功！";
    }

    public function get()
    {
        $user = Db::table("user")->select();
        $user = Db::table("user")->where("id", 1)->find();
        $user = Db::table("user")->where("id", 11)->findOrEmpty();
        $user = Db::table("user")->where("id", 1)->findOrFail();
        $user = Db::table("user")->select()->toArray();
        //halt($user);
        //$user = Db::table("user")->where("age", 14)->select();
        //halt(Db::table("user")->where("id", 1)->select());
        //return Db::getLastSql();
        return json($user);
    }

    public function get2()
    {
        $user = Db::name("user")->select();
        $user = Db::name("user")->where("id", 3)->value("name");
        $user = Db::name("user")->where("age", 14)->column("name", "id");

        // 批处理
//        Db::name("user")->chunk(2, function ($users) {
//            foreach ($users as $user) {
//                dump($user);
//            }
//            echo 1;
//        });

        // 游标查询
        $users = Db::name("user")->cursor();
        foreach ($users as $user) {
            dump($user);
        }

        //return Db::getLastSql();
        //return json($user);
    }

    public function add()
    {
//        $data = [
//            "id"    => 6,
//            "name"  =>  "马邦德",
//            "age"   =>  30,
//            "gender"  => "男",
//            "details" => "我是县长！"
//        ];

        $data = [
            "name"  =>  "塞尔达",
            "age"   =>  18,
            "gender"  => "女",
            "details" => "快来救我！"
        ];

        return Db::name("user")->insertGetId($data);
    }

    public function adds()
    {
        $data = [
            [
                "name"    => "林克",
                "age"     => 19,
                "gender"  => "男",
                "details" => "先收集999个呀哈哈！"
            ],
            [
                "name"    => "普尔亚",
                "age"     => 100,
                "gender"  => "女",
                "details" => "我先来个返老还童，再快速长大！"
            ]
        ];

        return Db::name("user")->insertAll($data);
    }

    public function update()
    {
        $data = [
            "id"    =>  4,
            "name"  =>  "王二狗",
            //"age"   =>  14
        ];

        //return Db::name("user")->where("id", 4)->update($data);
        //return Db::name("user")->update($data);
        //return Db::name("user")->exp("details", "UPPER(details)")->update($data);
        //return Db::name("user")->inc("age", 2)->update($data);

        return Db::name("user")->where("id", 4)->update([
            "details"   =>  Db::raw("UPPER(details)"),
            "age"       =>  Db::raw("age - 2")
        ]);
    }

    public function del()
    {
        //return Db::name("user")->delete(10);
        //return Db::name("user")->delete([11,12]);
        return Db::name("user")->where("name", "无名氏")->delete();
    }

    public function find()
    {
        $user = Db::name("user")->where("id", ">", 4)->select();
        $user = Db::name("user")->where("name", "like", "王%")->select();
        $user = Db::name("user")->whereLike("name", "王%")->select();
        $user = Db::name("user")->where("id", "in", [1, 3, 5])->select();
        $user = Db::name("user")->whereIN("id", [2, 4, 6])->select();
        $user = Db::name("user")->where("details", "not null")->select();
        $user = Db::name("user")->where("id", "exp", ">4 and `id` < 8")->select();

        $user = Db::name("user")->field("id,name")->where("id", ">", 4)->select();
        $user = Db::name("user")->count("details");
        //$user = Db::query("select * from tp_user");

        //return Db::getLastSql();
        return json($user);
    }

    public function link()
    {
        $user = Db::name("user")->where("age", ">", 15)
                                    ->where("gender", "男")->select();

        // 二维索引数组
        $user = Db::name("user")->where([
            ["age", ">", 15],
            ["gender", "=", "男"]
        ])->select();

        // 一维关联
        $user = Db::name("user")->where([
            "age"   =>  15,
            "gender"=>  "男"
        ])->select();

        $map[] = ["age", ">", 15];
        $map[] = ["gender", "=", "男"];
        $user = Db::name("user")->where($map)->select();


        //return Db::getLastSql();
        return json($user);
    }

    public function adv()
    {
        $user = Db::name("user")->where("name|details", "like", "%王%")
                    ->where("id&create_time", ">", 0)->select();

        $user = Db::name("user")->where([
            ["age", ">", 15],
            ["details", "like", "%我%"]
        ])->select();

        $user = Db::name("user")->where([[
            ["gender", "=", "男"],
            ["age", "exp", Db::raw(">=10 and id < 5")]
        ]])->where("details", "like", "%我%")->select();

        $map1 = [
            ["name", "like", "%王%"],
            ["details", "=", null]
        ];

        $map2 = [
            ["gender", "=", "女"],
            ["details", "exp", Db::raw("IS NOT NULL")]
        ];

        $user = Db::name("user")->whereOr([$map1, $map2])->select();
        //return Db::getLastSql();
        return json($user);
    }
}