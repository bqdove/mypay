<?php

namespace Bqdove\Pay\Gateways;

use Bqdove\Pay\Contracts\GatewayApplicationInterface;
use Bqdove\Pay\Contracts\GatewayInterface;

class Wechat implements GatewayApplicationInterface
{
    /**
     * Config
     * @var Config;
     */
    protected $config;


    /**
     * 微信 payload
     * @var array
     */
    protected $payload;

    /**
     * 微信支付网关
     * @var string
     */
    protected $gateway;

    public function pay($gateway, $params = [])
    {
        /*$this->payload = array_merge($this->payload, $params);*/
        $this->payload = [];
        $method = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $gateway)));
        $gateway = get_class($this) . '\\' . $method . 'Gateway';

        if (class_exists($gateway)) {
            return $this->makePay($gateway);
        }

        return '这里应该抛出异常的';
    }


    protected function makePay($gateway)
    {
        $app = new $gateway($this->config);
        if ($app instanceof GatewayInterface) {
            return $app->pay($this->gateway, $this->payload);
        }
        return '这里应该抛出异常的';

    }

    public function refund($order)
    {
        // TODO: Implement refund() method.
    }

    public function find($order)
    {
    }

    public function cancle($order)
    {
    }

    public function close($order)
    {
    }

    public function success()
    {
    }

    public function verfiy()
    {
    }

    public function __call($method, $params)
    {
        return self::pay($method, ...$params);
    }
}