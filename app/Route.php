<?php

namespace App;

class Route
{
    private string $method;
    private string $route;
    private array $handler;

    public function __construct(string $method, string $route, array $handler)
    {
        $this->method = $method;
        $this->route = $route;
        $this->handler = $handler;
    }

    /**
     * @return array
     */
    public function getHandler(): array
    {
        return $this->handler;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }
}