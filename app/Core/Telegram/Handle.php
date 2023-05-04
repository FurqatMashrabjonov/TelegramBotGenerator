<?php

namespace App\Core\Telegram;

class Handle
{
    protected object $parsedJson;
    public function __construct(string $json){
        $this->parsedJson = json_decode(file_get_contents($json));
    }

    public function build(): array
    {
        return (new Parser($this->parsedJson))->parse();
    }

}
