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
namespace App\Controller;

use App\JsonRpc\CalculatorServiceInterface;
use Hyperf\CircuitBreaker\Annotation\CircuitBreaker;
use Hyperf\Di\Annotation\Inject;

class IndexController extends AbstractController
{
    /**
     * @var CalculatorServiceInterface
     * @Inject()
     */
    protected $calculatorServiceInterface;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'value' => $this->calculatorServiceInterface->add(1,32),
            "config" => config('app_name'),
        ];
    }

    public function test()
    {
        return ['success' => 'success', 'time' => date('Y-m-d H:i:s')];
    }

    /**
     * 熔断测试
     * @return array
     * @CircuitBreaker(timeout=0.05, failCounter=1, successCounter=1, fallback="App\Controller\IndexController::breakerFallback")
     */
    public function breaker()
    {
        $sleep = $this->calculatorServiceInterface->sleep(1, 1);
        sleep(1);
        return [
            'message' => 'Hello',
            'sleep' => $sleep
        ];
    }

    public function breakerFallback()
    {
        return ['1' => 1];
    }
}
