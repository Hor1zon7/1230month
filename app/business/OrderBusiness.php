<?php

namespace app\business;

use app\model\Goods;
use app\model\Order;
use think\Exception;

class OrderBusiness
{
    public static function createOrder($id, $goods_id)
    {
//        生成唯一订单号
        $order_sn = md5(microtime() . $id);
//        获取商品价格
        $price = Goods::find($goods_id)['goods_price'];

//        拼接插入数据库的数组
        $arr = [
            'order_sn' => $order_sn,
            'order_price' => $price,
            'user_id' => $id
        ];
        return Order::create($arr);
    }

    /**
     * 展示订单
     * @param $request
     * @return array|\think\response\Json
     * @throws Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public static function showOrder($request)
    {

        $user_id = session('user_id');
        $order_sn = $request->get('order_sn');
//        如果该订单已经被提交，则不能重复进入提交页面
        if (cache('order_' . $order_sn)) {
            throw  new Exception('该订单已经提交支付');
        }
//        将订单编号存入缓存
        cache('order_' . $order_sn, $order_sn, 60);
//        判断订单名称是否被篡改
        $res = \app\model\Order::where('user_id', $user_id)
            ->where('order_sn', $order_sn)->find();
        if (!$res) {
            return errorX('订单编号错误');
        }
//        根据订单id查出详情
        return Order::where('order_sn', $order_sn)->find()->toArray();
    }

}












