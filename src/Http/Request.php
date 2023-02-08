<?php

namespace MehmetCoban\ProductFeed\Http;

class Request
{
    private static $instance = null;

    private function __construct(array $request, array $server)
    {
        foreach ($request as $key => $value) {
            $this->{strtolower($key)} = trim($value, '/');
        }

        foreach ($server as $key => $value) {
            $this->{strtolower($key)} = trim($value, '/');
        }
    }

    public function __call($name, $arguments)
    {
        return $this->{$name};
    }

    public static function capture()
    {
        if (static::$instance == null) {
            static::$instance = new Request($_REQUEST, $_SERVER);
        }

        return static::$instance;
    }

    public function getPath(): string
    {
        return $this->path_info ?? '';
    }

    public function getMethod(): string
    {
        return $this->request_method;
    }

    public function getAccept(): string
    {
        return $this->http_accept;
    }

    public function get(string $key, $default = null)
    {
        return $this->{$key} ?? $default;
    }
}