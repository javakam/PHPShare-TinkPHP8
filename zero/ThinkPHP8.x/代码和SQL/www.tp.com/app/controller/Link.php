<?php
namespace app\controller;
use app\BaseController;
use app\model\Profile;
use app\model\User;

class Link extends BaseController
{
    public function index()
    {
        //$user = User::find(10);
        //return json($user->profile->hobby);
        //echo $user->profile->save(["hobby"=>"相扑、作诗、喝酒！"]);
        //echo $user->profile()->save(["hobby"=>"不喜欢吃青椒！"]);

        //$profile = Profile::find(1);
        //return json($profile->user->name);

        // hasWhere
        //$user = User::hasWhere("profile", ["id"=>2])->find();
        //return json($user);

        // 闭包
        //$user = User::hasWhere("profile", function ($query) {
        //    $query->where("id", 2);
        //})->find();
        //return json($user);

        // 一对多
        //$user = User::find(48);
        //return json($user->profile->where("id", ">", 17));
        //return json($user->profile()->where("id", ">", 16)->select());
        //$user = User::has("profile", ">=", 2)->select();
        //return json($user);

        //$user = User::hasWhere("profile", ["visible"=>1])->select();
        //return json($user);

        //$user = User::find(48);
        //$user->profile()->save(["hobby"=>"测试4", "visible"=>1]);

        // 删除
        //$user = User::with("profile")->find(48);
        //$user->together(["profile"])->delete();

        // 预载入
//        $list = User::with(["profile"])->select([8, 9, 10]);
//        foreach ($list as $user)
//        {
//            dump($user->profile);
//        }

        //$list = User::with(["profile"])->select([8, 9, 10]);
        //return json($list->visible(["id","name", "profile.hobby"]));

        // 关联统计
        //$list = User::withCount(["profile" => "pc"])->select([8, 9, 10]);
        //foreach ($list as $user)
        //{
        //    echo $user->pc."<br>";
        //}

        //$user = User::find(10);
        //return json($user->role);

        // 新增
        //$user->role()->save(["type"=>"测试管理专员"]);

        $user = User::find(5);
        //$user->role()->save(1);
        //$user->role()->attach(2, ["details"=>"给张麻子赋予普通管理员权限！"]);
        $user->role()->detach(2);




    }
}