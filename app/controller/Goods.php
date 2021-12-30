<?php
declare (strict_types=1);

namespace app\controller;

use app\business\GoodsBusiness;
use think\facade\Log;
use think\Request;

class Goods
{
    /**
     * 跳转至商品列表页面
     * @param Request $request
     * @return \think\response\View
     */
    public function goodsList(Request $request)
    {
//        获取商品列表数据
        $data=GoodsBusiness::getGoodsList($request);
        return view('goodsList', compact('data'));
    }

    /**
     * 商品详情页
     * @param $id
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function detail($id)
    {
//        获取商品详情数据
        $data=GoodsBusiness::getDetailData($id);
        return view('detail', compact('data'));
    }

    /**
     * @param Request $request
     * @return \think\response\Redirect|void
     */
    public function pay(Request $request)
    {
        $id = $request->get('id');
//        判断是否登录，如果未登录跳转至登录页面，将地址存入缓存
        if (empty(session('token'))) {
            cache('backUrl', 'detail?id=' . $id);
            return redirect('login');
        }

        return redirect('createOrder?goods_id='.$id);

    }


}
