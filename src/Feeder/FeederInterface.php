<?php

namespace MehmetCoban\ProductFeed\Feeder;

interface FeederInterface
{
    public function execute(): string;
}