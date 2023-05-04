<?php

namespace App\Core\Telegram\Parsers;

use App\Core\Telegram\Templates\FunctionTemplate;

class FunctionParser
{

    protected array $functions;

    public function __construct(array $functions)
    {
        $this->functions = $functions;
    }

    public function build(): array
    {
        $arr = [];
        foreach ($this->functions as $function) {
            $arr[] = $this->makeTemplate($function);

        }
        return $arr;
    }

    public function makeTemplate(object $function): FunctionTemplate
    {
        return new FunctionTemplate($function->name, $function->arguments, $function->actions);
    }



}
