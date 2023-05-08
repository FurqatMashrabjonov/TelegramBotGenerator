<?php

namespace App\Core\Telegram\Helpers;

use Illuminate\Support\Facades\Log;

class Filler
{

    /**
     * @param $template
     * @param $args
     * @return string
     */
    public static function fill($template, $args): string
    {
        foreach (array_keys($args) as $key) {
            $tmp = explode('{{' . $key . '}}', $template);
            $template = $tmp[0] . $args[$key] . $tmp[1];
        }
        return $template;
    }

}
