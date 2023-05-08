<?php

namespace App\Core\Telegram\FileSystem;

class Store
{

    public static function storeFunctions(string $functions, $path): void
    {
        $path = public_path('telegram-bot');
        file_put_contents($path . '/functions.php', $functions);
    }

    public static function storeMain(string $content, $path): void
    {
        $path = public_path('telegram-bot');
        file_put_contents($path . '/bot.php', $content);
    }

}
