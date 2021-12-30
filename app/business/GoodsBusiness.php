<?php

namespace app\business;

use app\model\Goods;
use think\facade\Log;

class GoodsBusiness
{
    /**
     * 获取商品列表数据
     * @param $request
     * @return mixed|object|\think\App|\think\Paginator
     * @throws \think\db\exception\DbException
     */
    public static function getGoodsList($request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        //先判断缓存中是否有此页码数据
        if (cache('data_' . $page)) {
            //记录日志
            Log::record('读取了缓存中的数据');
            //如果有，则直接调用缓存数据
            return cache('data_' . $page);
        }
        $data = \app\model\Goods::paginate(20);
        //将当前页码的数据存入缓存中10秒
        cache('data_' . $page, $data, 10);
        return $data;
    }

    public static function getDetailData($id)
    {
        //根据id查出当前商品阅读量
        $read = Goods::find($id)['read'];
        //浏览量自增
        Goods::update(['read' => $read + 1], ['id' => $id]);
        return \app\model\Goods::find($id)->toArray();
    }
}