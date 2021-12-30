<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});

Route::group(function (){
    Route::get('login', 'Login/login');
    Route::post('dologin', 'Login/dologin');
    Route::get('goodsList', 'Goods/goodsList');
    Route::get('detail', 'Goods/detail');
    Route::get('pay', 'Goods/pay');
    Route::get('createOrder', 'Order/createOrder');
    Route::get('showOrder', 'Order/showOrder');

    Route::get('payOrder', 'Order/payOrder');
    Route::get('alipayBack', 'Order/alipayBack');



})->allowCrossDomain()->middleware(\app\middleware\checkLoginStatus::class);


