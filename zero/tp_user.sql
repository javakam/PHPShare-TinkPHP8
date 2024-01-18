-- 数据库

create table tp_user
(
    id         mediumint(7) unsigned auto_increment
        primary key,
    name       varchar(50)      default '无名氏' null,
    age        tinyint unsigned default 0        null,
    gender     char(6)          default '男'     null,
    detail     varchar(200)                      null,
    createtime datetime                          null
);


insert into func.tp_user (id, name, age, gender, detail, createtime)
values  (1, '张三', 15, '男', '我是张三！', null),
        (2, '李四', 14, '女', null, null),
        (3, '王五', 12, '男', null, null),
        (4, '王二狗', 14, '男', '我是王二狗！666', null),
        (5, '赵六', 13, '女', 'xxx', null),
        (9, '酒神', 17, '男', '好酒', null),
        (10, '石头', 16, '女', '真硬', null);