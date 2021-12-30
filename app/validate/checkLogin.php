<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class checkLogin extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        'username|用户名'=>'require',
        'password|密码'=>'require',
        'code|验证码'=>'require|captcha',
    ];


}
