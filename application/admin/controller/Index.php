<?php
namespace app\admin\controller;
use think\Controller;
use Db;

class Index extends Common
{
    public function index()
    {
        return $this->fetch();
    }
}
