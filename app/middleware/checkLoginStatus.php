<?php
declare (strict_types=1);

namespace app\middleware;

use app\lib\JWT;

class checkLoginStatus
{
    protected $arr = [
        'login',
        'dologin',
    ];

    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
//        获取当前请求路由
        $route = $request->action();
//        如果需要验证身份，进入判断token
        if (!in_array($route,$this->arr)) {
            $token=session('token');
            JWT::checkToken($token);
        }


        return $next($request);
    }
}
