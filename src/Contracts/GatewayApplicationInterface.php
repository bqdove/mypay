<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-1-12
 * Time: 11:44
 */

namespace Bqdove\Pay\Contracts;

interface GatewayApplicationInterface
{

    /**
     * 去支付
     * @param string $gateway
     * @param array $params
     * @return mixed
     */
    public function pay($gateway, $params);

    /**
     * 查询一个订单
     * @param string|array $order
     * @return mixed
     */
    public function find($order);


    /**
     * 退款
     * @param array $order
     * @return mixed
     */
    public function refund($order);

    /**
     * 取消订单
     * @param string|array $order
     * @return mixed
     */
    public function cancle($order);


    /**
     * 关闭订单
     * @param string|array $order
     * @return mixed
     */
    public function close($order);


    /**
     * 验证一个请求
     * @return mixed
     */
    public function verfiy();

    /**
     * 向服务器输出一个success
     * @return mixed
     */
    public function success();
}