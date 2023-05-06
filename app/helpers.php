<?php


/**
 * @param string $name
 * @param string $lang
 * @return mixed
 */
function getTemplate(string $name, string $lang = 'php'): string
{
    return require public_path("telegram-templates/$lang/$name.php");
}

function argumentsToString($arguments): string{
    $str = '';
    $count = count($arguments);
    foreach ($arguments as $key => $argument) {
        $str .= '$' . $argument;
        if ($count - $key != 1)
            $str .= ', ';
    }
    return $str;
}
