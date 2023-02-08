<?php

namespace MehmetCoban\ProductFeed\Feeder;

use MehmetCoban\ProductFeed\Http\Encoding;

class FeederFactory
{
    public static function make(string $provider, string $encoding): FeederInterface
    {
        return match ($provider) {
            'google' => match ($encoding) {
                Encoding::XML => new GoogleXMLFeeder(),
                Encoding::JSON => new GoogleJSONFeeder(),
                default => throw new \InvalidArgumentException('Unexpected encoding value')
            },
            //other providers added here
            default => throw new \InvalidArgumentException('invalid provider provided'),
        };
    }
}