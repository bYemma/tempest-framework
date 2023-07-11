<?php

namespace Tests\Tempest;

use Tempest\Interfaces\Server;
use Tempest\Http\Method;

final readonly class TestServer implements Server
{
    public function __construct(
        private Method $method = Method::GET,
        private string $uri = '/',
        private array $body = [],
    ) {}

    public function getMethod(): Method
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getBody(): array
    {
        return $this->body;
    }
}
