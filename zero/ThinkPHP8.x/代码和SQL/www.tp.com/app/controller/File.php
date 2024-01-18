<?php
namespace app\controller;
use app\BaseController;
use think\exception\ValidateException;
use think\facade\Filesystem;
use think\facade\Validate;
use think\Image;

class File extends BaseController
{
    public function up()
    {
        return view();
    }

    public function save()
    {
        $file = $this->request->file("image");
        // 规则
        $validate = Validate::rule([
            "image" =>  "file|fileExt:jpg,png,gif|fileSize:1024000"
        ]);

        // 验证
        $result = $validate->check([
            "image" =>  $file
        ]);

        // 判断
        if ($result) {
            // 上传到本地服务器
            Filesystem::putFile("topic", $file);
        } else {
            dump($validate->getError());
        }





//        $files = $this->request->file("image");
//        foreach ($files as $file) {
//            $saveNames[] = Filesystem::putFile("topic", $file);
//        }
//        halt($saveNames);


    }

    public function code()
    {
        return view();
    }

    public function getCode()
    {
        //$code = $this->request->param("code");

//        // 规则
//        $validate = Validate::rule([
//            "code|验证码"   =>  "require|captcha"
//        ]);
//
//        // 验证
//        $result = $validate->check([
//            "code"   =>  $code
//        ]);

        // 验证 +  规则 + 异常错误提醒
//        $this->validate([
//            // 验证
//            "code"   =>  $code
//        ], [
//            // 规则
//            "code|验证码"   =>  "require|captcha"
//        ]);

        // 助手函数
        if (!captcha_check(input("post.code"))) {
            throw new ValidateException("验证码错误！");
        }

    }

    public function image()
    {
        $image = Image::open("image.jpg");

        //echo $image->width();
        //$image->crop(550, 400)->save("crop1.png");

        //缩略图
        $image->thumb(550, 400, 3)->water("logo.jpg")->rotate(180)->save("thump1.png");
    }


}