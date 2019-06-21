<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
use Db;

class Common extends Controller
{
    public function initialize()
    {
        $name=Session::get('name');
        if (empty($name)) {
        	$this->redirect('login/login');
        }else{
        	$this->assign('name',$name);
        }
    }
}
