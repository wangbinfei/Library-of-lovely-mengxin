<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6
 * Time: 12:00
 */
namespace Home\Controller;
use Think\Controller;
include ROOT.'/Library_of_lovely_xin/Public/lib/BmobSms.class.php';
class RegisterController extends Controller{
    public function register()
    {
        $dataArray = $_POST;
        $resCheck = $this->check($_POST['user_name'], $_POST['user_check']);
        $dataArray['user_password'] = md5($dataArray['user_password']);
        $dataName['user_name'] = $dataArray['user_name'];
        $userObject = M('user');
        if(!$user_id = $userObject->where($dataName)->find())
        {
            $user_id = $userObject->add($dataArray);
        }else
        {
            die(0);
        }

        $userInfo = $this->setSession($user_id, $dataArray['user_name']);
        die(json_encode($userInfo));
    }

    public function setSession($user_id, $user_name)
    {
        session('user_id', $user_id);
        session('user_name', $user_name);
        return $_SESSION;
    }

    public function check($mobile, $check){
        $BmobSms = new \BmobSms();
        $res = $BmobSms->verifySmsCode($mobile, $check);
        $res = json_decode($res);
        if($res['msg'] != 'ok')die('falseCheck');
    }
}