<?php

namespace App\Core\Telegram\Generators;


use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Generator;

class CommandGenerator implements Generator
{
    public array $commands;

    public function __construct(array $commands){
        $this->commands = $commands;
    }
    public function generate(): string
    {
       $template = getTemplate('layouts/command');
       $body = '';
       foreach ($this->commands as $command){
           $body .= $command->template . PHP_EOL . PHP_EOL;
       }
       return Filler::fill($template, ['commands' => $body]);
    }
}
