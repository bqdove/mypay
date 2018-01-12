<?php

namespace Bqdove\Pay;

use Bqdove\Pay\Contracts\GatewayApplicationInterface;

class Pay
{
    /**
     * 配置项
     * @var array
     */
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * 确定网关是否存在
     * @param $method
     * @return GatewayApplicationInterface|string
     */
    protected function create($method)
    {
        $method = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $method)));
        $gateway = __NAMESPACE__ . "\\Gateways\\" . $method;
        if (class_exists($gateway)) {
            return self::make($gateway);
        }

        return '这里是要抛出异常的';
    }

    /**
     * 创建网关实例
     * @param $gateway
     * @return GatewayApplicationInterface
     */
    protected function make($gateway) : GatewayApplicationInterface
    {
        $app = new $gateway($this->config);
        if ($app instanceof GatewayApplicationInterface) {
            return $app;
        }
        return '这里是要抛出异常的';
    }

    /**
     * 当已静态方法调用时，会走这个流程
     * @param $method 请求非方法名
     * @param $params 请求的参数
     * @return GatewayApplicationInterface|string
     */
    public static function __callStatic($method, $params)
    {
        // TODO: Implement __callStatic() method.
        $app = new self(...$params);
        return $app->create($method);
    }
}
