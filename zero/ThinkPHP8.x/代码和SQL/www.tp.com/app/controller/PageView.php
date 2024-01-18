<?php
namespace app\controller;
use app\BaseController;
use app\model\User;

class PageView extends BaseController
{
    public function index()
    {
        $list = User::paginate(3, true);

        $page = $list->render();
        //$total = $list->total();

        return view("index", [
            "list"  =>  $list,
            "page"  =>  $page,
            //"total" =>  $total
        ]);
    }

}