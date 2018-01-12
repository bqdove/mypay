<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-1-12
 * Time: 11:58
 */

namespace Bqdove\Pay\Contracts;

interface GatewayInterface
{
    /**
     * 付款一个订单
     * @author HouJie <bqdove@126.com>
     * @param string $endpoint
     * @param array $payload
     * @return mixed
     */
    public function pay($endpoint, array $payload);
}