<?php

namespace App\Core\Telegram;

use App\Core\Telegram\Parsers\FunctionParser;

class Parser
{

    protected object $parsedJson;

    /**
     * @param object $parsedJson
     * @return void
     */
    public function __construct(object $parsedJson){
        $this->parsedJson = $parsedJson;
    }
    public function parse(): array
    {
        $functions = (new FunctionParser($this->parsedJson->functions))->build();
        return $functions;
    }

}
