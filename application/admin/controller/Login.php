<?php
namespace app\Admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Index extends Controller
{
    public function index()
    {
        if(request()->isPost()){
            $admin=new Admin();
            $data=input('post.');
            $num=$admin->login($data);
            if($num==3){
                 $this->success('登录成功了','Index/index');   
            }elseif($num==4){
                $this->error('验证码错误');
            }
            else{
                $this->error('用户名或者密码错误');
            }

        }
        return $this->fetch('login');
    }
}
