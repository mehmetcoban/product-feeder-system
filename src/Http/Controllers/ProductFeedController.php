<?php

namespace MehmetCoban\ProductFeed\Http\Controllers;

use MehmetCoban\ProductFeed\Feeder\FeederFactory;
use MehmetCoban\ProductFeed\Http\Encoding;
use MehmetCoban\ProductFeed\Http\Request;
use MehmetCoban\ProductFeed\Http\Response;

class ProductFeedController extends BaseController
{
    public function __construct()
    {
    }

    public function index(Request $request, $provider): Response
    {
        $accept = $request->getAccept();

        if (!in_array($accept, [Encoding::JSON, Encoding::XML])) {
            return $this->fatal($accept . ' is ot supported', 400);
        }

        $feedService = FeederFactory::make($request->get('provider', $provider), $accept);

        return $this->response($feedService->execute(), $accept);
    }
}