<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use \App\JsonRpc\CalculatorServiceInterface;
use \App\JsonRpc\Consumer\CalculatorServiceConsumer;
use Hyperf\JsonRpc\JsonRpcPoolTransporter;
use Hyperf\JsonRpc\JsonRpcTransporter;

return [
    //  定义客户端和服务端的关系
    CalculatorServiceInterface::class => CalculatorServiceConsumer::class,
    //  使用JsonRpc的连接池
    JsonRpcTransporter::class => JsonRpcPoolTransporter::class,
];
