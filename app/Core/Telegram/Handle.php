<?php

namespace App\Core\Telegram;

use App\Core\Telegram\Generators\FunctionGenerator;
use App\Core\Telegram\Templates\Layouts\MainTemplate;
use App\Core\Telegram\Templates\SendMessageTemplate;

class Handle
{
    protected object $parsedJson;
    public function __construct(string $json){
        $this->parsedJson = json_decode(file_get_contents($json));
    }

    public function build(): string
    {
        $readyContents = (new Parser($this->parsedJson))->parse();
        return (new MainTemplate([(new Generator())->command($readyContents['commands'])], 'adk;sdk;akdasldas;dasld;'))->fill();
    }

}
