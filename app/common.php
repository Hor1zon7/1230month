<?php
// 应用公共文件

//密码加盐
function encrypt_password($password)
{
    $salt = 'wcy';
    return md5($password . $salt);
}

//定义成功时的返回值
function successX($data='',$code=200,$msg='success')
{
    return json([
        'code'=>$code,
        'msg'=>$msg,
        'data'=>$data,
    ]);
}

//定义失败时的返回值
function errorX($msg='',$code=500,$data='')
{
    return json([
        'code'=>$code,
        'msg'=>$msg,
        'data'=>$data,
    ]);
}




// 过滤危险标签：防XSS攻击
if (!function_exists('remove_xss')) {

    //使用htmlpurifier防范xss攻击

    function remove_xss($string)
    {

        //composer安装的，不需要此步骤。相对index.php入口文件，引入HTMLPurifier.auto.php核心文件

        // require_once './plugins/htmlpurifier/HTMLPurifier.auto.php';

        // 生成配置对象

        $cfg = HTMLPurifier_Config::createDefault();

        // 以下就是配置：

        $cfg->set('Core.Encoding', 'UTF-8');

        // 设置允许使用的HTML标签

        $cfg->set('HTML.Allowed', 'div,b,strong,i,em,a[href|title],ul,ol,li,br,p[style],span[style],img[width|height|alt|src]');

        // 设置允许出现的CSS样式属性

        $cfg->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');

        // 设置a标签上是否允许使用target="_blank"

        $cfg->set('HTML.TargetBlank', TRUE);

        // 使用配置生成过滤用的对象

        $obj = new HTMLPurifier($cfg);

        // 过滤字符串

        return $obj->purify($string);

    }
}