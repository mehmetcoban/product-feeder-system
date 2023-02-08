<?php

use MehmetCoban\ProductFeed\Http\Controllers\ProductFeedController;
use MehmetCoban\ProductFeed\Http\Request;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::capture();

switch ($request->getMethod()) {
    case 'GET':
        switch ($request->request_uri) {
            case 'product': // or 'product/google'
                echo (new ProductFeedController())->index($request, 'google')->getData();

            //or you can use other providers added in FeederFactory
            /*
             case 'product/facebook':
                 echo (new ProductFeedController())->index($request, 'facebook')->getData();
            */
        }
}