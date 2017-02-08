<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/5
 * Time: 16:09
 */
namespace Home\Controller;
use Think\Controller;
include ROOT.'/Library_of_lovely_xin/Public/lib/BmobSms.class.php';
class CheckController extends Controller
{

//    获取验证码
    public function check()
    {
        var_dump($_POST);
        $BmobSms = new \BmobSms();
        $res = $BmobSms->sendSmsVerifyCode($_POST['user_phone'], '注册模板');
        die($res);
    }


}