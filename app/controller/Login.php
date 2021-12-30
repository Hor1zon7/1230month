<?php
declare (strict_types=1);

namespace app\controller;

use app\business\LoginBusiness;
use app\lib\JWT;
use app\model\User;
use app\validate\checkLogin;
use think\Request;

class Login
{
    public function login()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        try {
            LoginBusiness::dologin($request);
        }catch (\Exception $e){
            return errorX($e->getMessage());
        }


//        $data = $request->post();
//        $data['password'] = encrypt_password($data['password']);
////        验证数据
//        $val = new checkLogin();
//        $res = $val->check($data);
//        if (!$res) {
//            return errorX($val->getError());
//        }
//        unset($data['code']);
////        查询账号密码是否正确
//        $res = User::where($data)->find();
//        if (!$res) {
//            return errorX('账号或密码不正确');
//        }
//        //        登录成功，颁发token令牌
//        $token = JWT::signToken($res['id']);
//        session('token', $token);
//        session('user_id',$res['id']);

//        如果缓存中有backurl，则直接返回并销毁
        if (cache('backUrl')) {
            $route = cache('backUrl');
            cache('backUrl', null);
            return successX($route);
        }

        return successX('goodsList');

    }
}
