<?php

namespace app\admin\controller;

use app\BaseController;

class Article extends BaseController
{
    public function index()
    {
        return "新闻！" . $this->app->getBasePath() . " ; " . $this->request->action();
    }
}