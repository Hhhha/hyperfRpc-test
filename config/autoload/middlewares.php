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

use Hyperf\Metric\Middleware\MetricMiddleware;
use Hyperf\Tracer\Middleware\TraceMiddleware;

return [
    'http' => [
        TraceMiddleware::class,
        MetricMiddleware::class
    ],
    'jsonrpc-http' => [
        TraceMiddleware::class,
    ],
];
