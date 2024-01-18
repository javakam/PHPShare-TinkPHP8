<?php
namespace app\model;
use think\Model;

class User extends Model
{
    public function profile()
    {
        // 一对一
        //return $this->hasOne(Profile::class);
        // 一对多
        return $this->hasMany(Profile::class);
    }

    public function role()
    {
        // 多对多
        return $this->belongsToMany(Role::class, Access::class);
    }
}