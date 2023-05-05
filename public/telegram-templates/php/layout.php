<?php

return 'require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client(\'{{token}}\');
    {{body}}

    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}';
