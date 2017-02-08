<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/7
 * Time: 13:09
 */
namespace Home\Controller;
use Think\Controller;
class ExitController extends Controller{
    public function exitLogin()
    {
        session('user_id', null);
        session('user_name', null);
        $this->success('退出成功', U('index/index'));
    }
}