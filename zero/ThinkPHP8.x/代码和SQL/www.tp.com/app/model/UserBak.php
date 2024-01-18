<?php
namespace app\model;
use think\Model;
use think\model\concern\SoftDelete;

class UserBak extends Model
{
    // 开启软删除
    use SoftDelete;


    // 设置表名
    //protected $name = "user2";

    // 初始化
    public static function init()
    {
        //echo "初始化！";
    }

    // 字段设置
//    protected $schema = [
//        "id"=>"int"
//    ];

    // 废弃
    //protected $disuse = ["age", "details"];

    // 只读
    //protected $readonly = ["age", "details"];

    // 获取器
    public function getStatusAttr($value, $data)
    {
        //halt($data["name"]);
        $status = [-1=>"删除", 0=>"冻结", 1=>"正常", 2=>"待审核"];
        return $status[$value];
    }

    // 修改器
    public function setAgeAttr($value)
    {
        return $value + 100;
    }

    // 搜索器：模糊查名字
    public function searchNameAttr($query, $value, $data)
    {
        $query->where("name", "like", "%".$value."%");
        // 按id倒序
        if (isset($data["sort"])) {
            $query->order($data["sort"]);
        }
    }

    // 搜索器：限定时间
    public function searchCreateTimeAttr($query, $value, $data)
    {
        $query->whereBetweenTime("create_time", $value[0], $value[1]);
    }

    // 查询后，触发
    protected static function onAfterRead($user)
    {
        echo "执行了事件！".$user->id;
    }


}