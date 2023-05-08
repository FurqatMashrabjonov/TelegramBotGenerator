<?php

require_once "vendor/autoload.php";
$function = require_once "functions.php";

try {
    $bot = new \TelegramBot\Api\Client("adk;sdk;akdasldas;dasld;");

    $bot->command("start", function ($message) use ($bot, $function) {
   $bot->sendChatAction(-3424234, "typing2");
      $bot->sendChatAction(-3424234, "typing");
      
});

$bot->command("ping", function ($message) use ($bot, $function) {
   $function->getData("Furqat", true, );
      
});


   

    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}