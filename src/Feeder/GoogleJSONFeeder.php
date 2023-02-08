<?php

namespace MehmetCoban\ProductFeed\Feeder;

use MehmetCoban\ProductFeed\Model\Product;

class GoogleJSONFeeder implements FeederInterface
{
    public function execute(): string
    {
        header('Content-Type: application/json; charset=utf-8');

        $file = file_get_contents(__DIR__ . '/../../public/demo-products.json');
        $demoItems = json_decode($file, true);
        $items = [];

        foreach ($demoItems as $rawItem) {
            $items[] = (new Product())
                ->setId($rawItem['id'])
                ->setName($rawItem['name'])
                ->setPrice($rawItem['price'])
                ->toArray();
        }

        return json_encode($items);
    }
}