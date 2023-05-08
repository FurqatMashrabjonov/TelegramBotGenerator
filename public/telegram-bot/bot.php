<?php

require_once "vendor/autoload.php";
require_once "functions.php";

try {
    $bot = new \TelegramBot\Api\Client("adk;sdk;akdasldas;dasld;");

    $bot->command("start", function ($message) use ($bot) {
   $bot->sendChatAction(-3424234, "typing2");
      $bot->sendChatAction(-3424234, "typing");
      
});

$bot->command("ping", function ($message) use ($bot) {
   $function->getData("Furqat", 1, );
      
});


   

    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}