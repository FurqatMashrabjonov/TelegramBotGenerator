<?php

namespace App\Core\Telegram;

use App\Core\Telegram\FileSystem\Store;
use App\Core\Telegram\Generators\FunctionGenerator;
use App\Core\Telegram\Templates\Layouts\MainTemplate;
use App\Core\Telegram\Templates\SendMessageTemplate;

class Handle
{
    protected object $parsedJson;
    public function __construct(string $json){
        $this->parsedJson = json_decode(file_get_contents($json));
    }

    public function build(): array
    {
        $readyContents = (new Parser($this->parsedJson))->parse();
        Store::storeFunctions((new FunctionGenerator($readyContents['functions']))->generate(), public_path('telegram-bot'));
        Store::storeMain((new MainTemplate([(new Generator())->command($readyContents['commands'])], 'adk;sdk;akdasldas;dasld;'))->fill(), public_path('telegram-bot'));
        return [
            (new MainTemplate([(new Generator())->command($readyContents['commands'])], 'adk;sdk;akdasldas;dasld;'))->fill(),
            (new FunctionGenerator($readyContents['functions']))->generate()
            ];
    }

}
