<?php

namespace MehmetCoban\ProductFeed\Http;

class Response
{
    private mixed $data;
    private string $encoding;
    private int $status;

    public function __construct($data, $encoding = Encoding::JSON, $status = 200)
    {
        $this->data = $data;
        $this->encoding = $encoding;
        $this->status = $status;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function getEncoding(): string
    {
        return $this->encoding;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}