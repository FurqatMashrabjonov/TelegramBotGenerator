<?php

return '<?php

require_once "vendor/autoload.php";
require_once "functions.php";

try {
    $bot = new \TelegramBot\Api\Client("{{token}}");

    {{body}}

    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}';
