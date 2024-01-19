ThinkPHP 8.0 Study
===============

> ThinkPHP8.0的运行环境要求PHP8.0.0+

> 开发手册: https://doc.thinkphp.cn

## 配置

`php.ini` 必需的扩展

~~~properties
extension_dir="ext"
extension=php_zip
extension=php_pdo_mysql
extension=php_fileinfo
extension=php_curl
extension=openssl
~~~

## 安装

~~~
composer create-project topthink/think tp
~~~

启动服务

~~~
php think run
~~~

然后就在浏览器中访问 `http://localhost:8000`

更新框架使用 `composer update topthink/framework`

## 开发

- `php think run` 环境下，访问 `http://localhost:8000` 进行开发调试

- `phpstudy` 环境下，访问 `http://自定义域名` 进行开发调试

✨这俩环境可以同时运行。


