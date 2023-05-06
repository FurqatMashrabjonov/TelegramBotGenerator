<?php

namespace App\Core\Telegram;

use App\Core\Telegram\Generators\FunctionGenerator;

class Handle
{
    protected object $parsedJson;
    public function __construct(string $json){
        $this->parsedJson = json_decode(file_get_contents($json));
    }

    public function build(): string
    {
        $readyContents = (new Parser($this->parsedJson))->parse();
        return (new FunctionGenerator($readyContents['functions']))->generate();
    }

}
