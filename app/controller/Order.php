<?php
declare (strict_types=1);

namespace app\controller;

use app\business\OrderBusiness;
use think\facade\Log;
use think\Request;

class Order
{
    /**
     * 创建订单
     * @param Request $request
     * @return \think\response\Redirect
     */
    public function createOrder(Request $request)
    {
        $id = session('user_id');
        $goods_id = $request->get('goods_id');
        $order = OrderBusiness::createOrder($id, $goods_id)->toArray();
        return redirect('showOrder?order_sn=' . $order['order_sn']);
    }

    /**
     * 展示订单
     * @param Request $request
     * @return \think\response\Json|\think\response\View
     */
    public function showOrder(Request $request)
    {
        try {
            $order = OrderBusiness::showOrder($request);
        } catch (\Exception $e) {
            return errorX($e->getMessage());
        }
        return view('order', compact('order'));
    }

    /**
     * 支付订单
     * @param Request $request
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function payOrder(Request $request)
    {
        $order_sn = $request->get('order_sn');
//        根据订单号查询订单信息
        $order = \app\model\Order::where('order_sn', $order_sn)->find()->toArray();

        echo "<form id=alipayment action=./alipay/pagepay/pagepay.php method=post>
            <input id='WIDout_trade_no' name='WIDout_trade_no' value='" . $order['order_sn'] . "' />
            <input id='WIDsubject' name='WIDsubject' value='沙箱支付114514' />
            <input id='WIDtotal_amount' name='WIDtotal_amount' value='" . $order['order_price'] . "'/></form>
            <script>document.getElementById('alipayment').submit();</script>";
    }

    /**
     * 支付宝回调函数
     * @return \think\response\Json|void
     * @throws \Exception
     */
    public function alipayBack()
    {
        require_once("./alipay/config.php");
        require_once './alipay/pagepay/service/AlipayTradeService.php';
//        获取回调数据
        $data = input();
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($data);
        if($result){
            $order_sn=$data['out_trade_no'];
//            记录日志
            Log::write('订单编号'.$order_sn.'支付成功');
//            修改订单状态
            \app\model\Order::update(['status' => 1], ['order_sn' => $order_sn]);
            echo '支付完成';
        }else{
            return errorX('验证失败');
        }


    }
}


















