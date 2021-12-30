<?php

namespace app\business;

use app\lib\JWT;
use app\model\User;
use app\validate\checkLogin;
use think\Exception;

class LoginBusiness
{
    public static function dologin($request)
    {
        $data = $request->post();
        $data['password'] = encrypt_password($data['password']);
//        验证数据
        $val = new checkLogin();
        $res = $val->check($data);
        if (!$res) {
            return errorX($val->getError());
        }
        unset($data['code']);
//        查询账号密码是否正确
        $res = User::where($data)->find();
        if (!$res) {
            return errorX('账号或密码不正确');
        }
        //        登录成功，颁发token令牌
        $token = JWT::signToken($res['id']);
        session('token', $token);
        session('user_id', $res['id']);
    }
}