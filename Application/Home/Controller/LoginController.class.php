<?php
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class LoginController extends Controller
{
    public function login(){
        $this->display();
    }

    public function isLogin(){
        if($_POST['boyfriend'] == '王斌飞')
        {
            session('boyfriend', '王斌飞');
            $this->success('答案正确', U('Index/index'));
        }
    }

    public function ajaxLogin()
    {
        $whereArray = $_POST;
        $whereArray['user_password'] = md5($whereArray['user_password']);
        $userInfo = M('user')->where($whereArray)->find();
        if(!$userInfo){
            echo 0;
        }else{
            $setSession = new RegisterController();
            $setSession->setSession($userInfo['user_id'], $userInfo['user_name']);
            echo json_encode(array('user_id' => $userInfo['user_id'], 'user_name'=> $userInfo['user_name']));
        }
    }
    
}