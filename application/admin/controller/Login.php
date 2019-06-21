<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use think\facade\Session;
use Request;
use Db;

class Login extends Controller
{

    public function login()
    {
        return $this->fetch();
    }

    public function loginAction()
    {
        $code=Request::get('code');
        $name=Request::get('name');
        $pwd=Request::get('pwd');
        $captcha = new Captcha();
        if (!$captcha->check($code)) {
        	$arr=['code'=>'1','status'=>'error','message'=>'验证码错误'];

        }else{
        	$where=['name'=>$name,'pwd'=>$pwd];
        	$res=DB::table('admin')->where($where)->find();
        	if (empty($res)) {
        		$arr=['code'=>'2','status'=>'error','message'=>'账号或密码错误'];
        	}else{
        		$arr=['code'=>'0','status'=>'ok','message'=>'登陆成功'];
                Session::set('name',$name);
        	}
        }
        $json=json_encode($arr);
        echo $json;
    }
    public function loginOut()
    {
        Session::delete('name');
        $this->redirect('login/login');
    }
}
