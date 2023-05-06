<?php

namespace App\Core\Telegram\Generators;


use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Generator;

class FunctionGenerator implements Generator
{
    public array $functions;

    public function __construct(array $functions){
        $this->functions = $functions;
    }
    public function generate(): string
    {
       $template = getTemplate('layouts/function');
       $body = '';
       foreach ($this->functions as $function){
           $body .= $function->template . PHP_EOL . '   ';
       }
       return Filler::fill($template, ['functions' => $body]);
    }
}
