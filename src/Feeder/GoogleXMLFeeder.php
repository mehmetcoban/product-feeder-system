<?php

namespace MehmetCoban\ProductFeed\Feeder;

use MehmetCoban\ProductFeed\Model\Product;

class GoogleXMLFeeder implements FeederInterface
{

    public function execute(): string
    {
        header('Content-Type: application/xml; charset=utf-8');

        $file = file_get_contents(__DIR__ . '/../../public/demo-products.json');
        $demoItems = json_decode($file, true);
        $items = [];

        foreach ($demoItems as $rawItem) {
            $items[] = (new Product())
                ->setId($rawItem['id'])
                ->setName($rawItem['name'])
                ->setPrice($rawItem['price']);
        }

        return $this
            ->arrayToXml(new \SimpleXMLElement('<Products/>'), $this->dataTransform($items))
            ->asXML();

    }

    private function dataTransform($data)
    {
        foreach ($data as $item) {
            $items[] = [
                'productId' => $item->getId(),
                'productName' => $item->getName(),
                'productPrice' => $item->getPrice(),
            ];
        }

        return $items;
    }

    private function arrayToXml(\SimpleXMLElement $xml, array $data)
    {
        foreach ($data as $key => $val) {
            if (is_array($val)) {
                $newObject = $xml->addChild('Product');
                $this->arrayToXml($newObject, $val);
            } else {
                    ($key != 0 && $key == (int)$key) ?? $xml->addChild($key, $val);
                $xml->addChild($key, $val);
            }
        }

        return $xml;
    }
}