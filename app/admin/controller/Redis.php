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

    //获取有序集合中指定范围内的成员: Cache::store('redis')->range('name', 1, -1);
    //获取范围内的元素: Cache::store('redis')->lrange('name', 1, -1);
    //移除列表中的元素: Cache::store('redis')->lrem('name', 1, '小明');
    //修改指定位置的元素: Cache::store('redis')->lset('name', 0, '小明');
    //保留指定范围内的元素, 同时删除其它元素: Cache::store('redis')->ltrim('name', 0, 1);
    //向列表头部添加元素: Cache::store('redis')->lpush('name', '小明');
    //在指定元素之前插入新元素: Cache::store('redis')->linsert('name', 'before', '小明', '小明');
    //在指定元素之前插入新元素: Cache::store('redis')->linsert('name', 'after', '小明', '小明');
    //获取指定位置的元素值: Cache::store('redis')->lindex('name', 0);
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