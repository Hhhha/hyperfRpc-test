<?php


namespace App\Exception\Handler\Service;


use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\RateLimit\Exception\RateLimitException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * Class RateLimitExceptionHandler
 * 触发限流的时候会捕获异常
 * @package App\Exception\Handler\Service
 */
class RateLimitExceptionHandler
{

    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(StdoutLoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    //  TODO 捕获异常失败
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->logger->debug("sssadsadashdjhk");
        $this->logger->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()));
        $this->logger->error($throwable->getTraceAsString());
        return $response->withHeader('Server', 'Hyperf')->withStatus(500)->withBody(new SwooleStream('Internal Server Error.'));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}