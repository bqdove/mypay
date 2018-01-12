<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-1-12
 * Time: 12:07
 */

namespace Bqdove\Pay\Gateways\Wechat;


use Bqdove\Pay\Contracts\GatewayInterface;

class AaGateway implements GatewayInterface
{
    public function pay($endpoint, array $payload)
    {
        // TODO: Implement pay() method.
        echo "This is a demo".PHP_EOL;
    }
}