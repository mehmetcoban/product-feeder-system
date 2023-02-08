<?php

namespace MehmetCoban\ProductFeed\Http\Controllers;

use MehmetCoban\ProductFeed\Http\Request;
use MehmetCoban\ProductFeed\Http\Response;
use MehmetCoban\ProductFeed\Http\Encoding;

class BaseController
{
    protected Request $request;

    protected function response(mixed $data, string $encoding = Encoding::JSON, $status = 200)
    {
        return new Response($data, $encoding, $status);
    }

    protected function json(mixed $data, $status = 200)
    {
        return $this->response($data,Encoding::JSON, $status);
    }

    protected function xml(mixed $data, $status = 200)
    {
        return $this->response($data, Encoding::XML, $status);
    }

    protected function fatal(string $message, int $status)
    {
        return new Response($message, 'text/html', $status);
    }
}