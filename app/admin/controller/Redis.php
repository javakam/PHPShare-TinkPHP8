<?php

namespace app\admin\controller;

use think\facade\Cache;

/**
 * Redis 缓存操作
 * @author machangbao
 */
class Redis
{
    public function hello($name = '')
    {
        return 'hello,' . $name;
    }

    //插入: Cache::store('redis')->set('name', '小明', 3600);
    //读取: $value = Cache::store('redis')->get('name');
    //判断是否存在: $has = Cache::store('redis')->has('name'); 存在返回1,不存在返回0
    //删除: Cache::store('redis')->rm('name');
    //自增: Cache::store('redis')->inc('num');
    //自减: Cache::store('redis')->dec('num');
    //设置过期时间: Cache::store('redis')->expire('name', 3600);
    //设置多个: Cache::store('redis')->setMultiple(['name' => '小明', 'age' => 18], 3600);
    //追加数据: Cache::store('redis')->push('name', '小明');
    //获取长度: Cache::store('redis')->getLength('name');
    //获取多个: $value = Cache::store('redis')->getMultiple(['name', 'age']);
    //删除多个: Cache::store('redis')->rmMultiple(['name', 'age']);
    //清空缓存: Cache::store('redis')->clear();
    //push:  Cache::store('redis')->
    public function redis()
    {
        $redis = Cache::store('redis');
        if ($redis) {
            $redis->set('tplink', 'http://www.thinkphp.com');
            echo date('Y年m月d日 H:i:s') . ' redis连接成功！' . "<br>";
            print_r($redis->has('tplink'));
            print_r($redis->get('tplink'));
        } else {
            echo 'redis连接失败！';
        }
    }
}