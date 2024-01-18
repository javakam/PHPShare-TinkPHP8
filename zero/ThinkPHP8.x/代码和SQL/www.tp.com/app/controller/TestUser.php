<?php
namespace app\controller;
use app\BaseController;
use app\model\UserBak;
use think\facade\Db;

class TestUser extends BaseController
{
    public function index()
    {
        $user = UserBak::withTrashed()->select();
        //$user = UserBak::onlyTrashed()->select();
        return json($user);

        //$user = UserBak::find(1);
        //echo $user->status;
        //echo $user->getData("status");
        //$user = UserBak::select()->withAttr("age", function ($value) {
        //    return $value + 100;
        //});

        //return json($user);
    }

    public function add()
    {
        //$user = new UserBak;
//        $user->name = "李白";
//        $user->age = 28;
//        $user->gender = "男";
//        $user->details = "床前明月光，好诗！";

//        $user->replace()->allowField(["id", "name", "age", "gender"])->save([
//            "id"    => "34",
//            "name"  =>  "蒲松龄",
//            "age"   =>  26,
//            "gender"  =>  "男",
//            "details" =>  "十里平湖霜满天，好诗！"
//        ]);
//
//        return $user->id;
//        $user->saveAll([
//           [
//               "name"  =>  "赵六",
//               "age"   =>  19,
//               "gender"=>  "男"
//           ],[
//                "name"  =>  "钱七",
//                "age"   =>  22,
//                "gender"=>  "男",
//                "details"   =>  "我很有钱，排行老七！"
//            ]
//        ]);

//        $user = UserBak::create([
//            "name"  =>  "李逍遥",
//            "age"   =>  18,
//            "gender"=>  "男",
//            "details"   =>  "我是一代主角！"
//        ], ["name", "age", "gender", "details"], false);

        return UserBak::create([
            "name"  =>  "酒剑仙",
            "age"   =>  58,
            "gender"=>  "男",
            "details"   =>  "我是隐藏主角！"
        ]);
    }

    public function del()
    {
        //$user = UserBak::find(34);
        //return $user->delete();
        //return UserBak::destroy(37);
        //return json($user);

        //UserBak::destroy(function ($query) {
        //    $query->where("id", ">", 38);
        //});

        // 软删除
        echo UserBak::destroy(1);


    }

    public function update()
    {
        //$user = UserBak::find(38);
        //$user = UserBak::where("name", "李逍遥")->find();
        //$user->details = "我想做二代主角！";
        //$user->age = Db::raw("age + 2");
        //echo $user->force()->save();

        //return UserBak::update(["gender"=>"男", "age"=>20], ["id"=>38]);

        $user = UserBak::onlyTrashed()->find(1);
        $user->restore();
        return json($user);
    }

    public function select()
    {
        //$user = UserBak::find(1);
        //$user = UserBak::select();
        //$user = UserBak::select([1, 3, 5]);

        //$user = UserBak::where("id", "<",5)->select();
        //$user = UserBak::limit(3)->order("id", "desc")->select();
        //$user = UserBak::count();
        //$user = UserBak::whereLike("name", "%王%")->select();
        //return json($user);

        $user = UserBak::withSearch(["name", "create_time"],[
            "name"  =>  "李",
            "create_time"   =>  ["2022-1-1", "2023-12-12"],
            "sort"  =>  ["id"=>"desc"]
        ])->select();

        //return Db::getLastSql();
        return json($user);

    }
}





