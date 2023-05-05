<?php

namespace App\Core\Telegram\Generators;


use App\Core\Telegram\Interfaces\Generator;

class FunctionGenerator implements Generator
{
    public array $functions;

    public function __construct(array $functions){
        $this->functions = $functions;
    }
    public function generate(): string
    {
       return getTemplate('layouts/function');
    }
}
