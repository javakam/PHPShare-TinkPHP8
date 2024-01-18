-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-12-28 09:14:05
-- 服务器版本： 8.0.31
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_access`
--

CREATE TABLE `tp_access` (
  `id` smallint UNSIGNED NOT NULL,
  `user_id` mediumint UNSIGNED NOT NULL,
  `role_id` tinyint UNSIGNED NOT NULL,
  `details` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `tp_access`
--

INSERT INTO `tp_access` (`id`, `user_id`, `role_id`, `details`) VALUES
(1, 4, 1, NULL),
(2, 10, 3, NULL),
(3, 10, 5, NULL),
(4, 10, 2, NULL),
(5, 10, 6, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tp_profile`
--

CREATE TABLE `tp_profile` (
  `id` mediumint UNSIGNED NOT NULL,
  `user_id` mediumint UNSIGNED NOT NULL,
  `hobby` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `visible` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `tp_profile`
--

INSERT INTO `tp_profile` (`id`, `user_id`, `hobby`, `visible`) VALUES
(1, 22, '吃肉、喝酒！', 1),
(2, 10, '相扑、作诗、喝酒！', 0),
(3, 38, '泡妞、耍无赖！', 1),
(4, 8, '逛神庙、打盖侬！', 0),
(5, 7, '发脾气、收藏！', 0),
(6, 46, '喝酒、谈恋爱！', 1),
(7, 5, '让子弹飞一会儿！', 0),
(11, 10, '不喜欢吃青椒！', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tp_role`
--

CREATE TABLE `tp_role` (
  `id` tinyint UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `tp_role`
--

INSERT INTO `tp_role` (`id`, `type`) VALUES
(1, '超级管理员'),
(2, '普通管理员'),
(3, '用户管理专员'),
(4, '评论管理专员'),
(5, '编辑管理专员'),
(6, '测试管理专员');

-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE `tp_user` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '无名氏',
  `age` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `gender` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '男',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `details` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  `create_time` datetime DEFAULT '1997-01-01 00:00:00',
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tp_user`
--

INSERT INTO `tp_user` (`id`, `name`, `age`, `gender`, `status`, `details`, `delete_time`, `create_time`, `update_time`) VALUES
(1, '张三', 15, '男', -1, '我是一个人！', NULL, '2016-01-01 01:23:10', '2023-11-23 21:08:16'),
(2, '李四', 14, '女', 0, NULL, NULL, '2017-05-21 01:23:40', NULL),
(3, '王五', 16, '男', 2, NULL, NULL, '2018-07-22 01:23:40', NULL),
(4, '王二狗', 15, '男', 1, '我是王二狗！MINI', NULL, '2019-08-12 04:45:40', NULL),
(5, '张麻子', 28, '男', -1, '我脸上没有麻子！', NULL, '2020-11-22 03:45:30', NULL),
(6, '马邦德', 30, '男', 0, '我是县长！', NULL, '2021-05-21 02:31:20', NULL),
(7, '塞尔达', 18, '女', 1, '快来救我！', NULL, '2022-08-21 04:52:10', NULL),
(8, '林克', 19, '男', 0, '先收集999个呀哈哈！', NULL, '2023-10-20 11:51:10', NULL),
(9, '普尔亚', 100, '女', -1, '我先来个返老还童，再快速长大！', NULL, '2023-10-21 17:16:22', NULL),
(10, '李白', 28, '男', 1, '床前明月光，好诗！', NULL, '2023-11-20 22:31:13', '2023-11-20 22:31:13'),
(22, '蒲松龄', 26, '男', 2, NULL, NULL, '2023-11-20 22:33:50', '2023-11-20 22:33:50'),
(35, '赵六', 19, '男', 0, NULL, NULL, '2023-11-20 22:35:21', '2023-11-20 22:35:21'),
(36, '钱七', 22, '男', -1, '我很有钱，排行老七！', NULL, '2023-11-20 22:35:21', '2023-11-20 22:35:21'),
(38, '李逍遥', 18, '男', 1, '我想做二代主角！', NULL, '2023-11-20 22:37:08', '2023-11-23 20:09:52'),
(46, '酒剑仙', 58, '男', 0, '我是隐藏主角！', '2023-11-23 13:07:23', '2023-11-23 20:49:36', '2023-11-23 21:07:23');

--
-- 转储表的索引
--

--
-- 表的索引 `tp_access`
--
ALTER TABLE `tp_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tp_access_tp_user` (`user_id`),
  ADD KEY `FK_tp_access_tp_role` (`role_id`);

--
-- 表的索引 `tp_profile`
--
ALTER TABLE `tp_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tp_profile_tp_user` (`user_id`);

--
-- 表的索引 `tp_role`
--
ALTER TABLE `tp_role`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `tp_user`
--
ALTER TABLE `tp_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_access`
--
ALTER TABLE `tp_access`
  MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `tp_profile`
--
ALTER TABLE `tp_profile`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `tp_role`
--
ALTER TABLE `tp_role`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `tp_user`
--
ALTER TABLE `tp_user`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- 限制导出的表
--

--
-- 限制表 `tp_access`
--
ALTER TABLE `tp_access`
  ADD CONSTRAINT `FK_tp_access_tp_role` FOREIGN KEY (`role_id`) REFERENCES `tp_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tp_access_tp_user` FOREIGN KEY (`user_id`) REFERENCES `tp_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `tp_profile`
--
ALTER TABLE `tp_profile`
  ADD CONSTRAINT `FK_tp_profile_tp_user` FOREIGN KEY (`user_id`) REFERENCES `tp_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
