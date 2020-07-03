<?php


namespace App\JsonRpc\Service;

use App\JsonRpc\CalculatorServiceInterface;
use Hyperf\CircuitBreaker\Annotation\CircuitBreaker;
use Hyperf\RateLimit\Annotation\RateLimit;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * Class CalculatorService
 * @package App\Servers
 * @RpcService(name="CalculatorService", protocol="jsonrpc-http", server="jsonrpc-http")
 */
class CalculatorService implements CalculatorServiceInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int
     * @RateLimit()
     */
    public function add(int $a, int $b):int
    {
        return $a + $b;
    }

    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function sleep(int $a, int $b):int
    {
        return $a + $b;
    }
}