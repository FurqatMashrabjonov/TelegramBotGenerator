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

function argumentsToString($arguments): string
{
    $str = '';
    $count = count($arguments);
    foreach ($arguments as $key => $argument) {
        $str .= '$' . $argument;
        if ($count - $key != 1)
            $str .= ', ';
    }
    return $str;
}

function argumentsToStringWithValue($arguments): string
{
    $str = '';
    $i = 0;
    foreach ($arguments as $key => $argument) {
        $str .= '$' . $key . ' = ' . ((gettype($argument) == 'string') ? '"' . $argument . '"' : $argument);
        if (count($arguments) - $i != 1)
            $str .= ', ';
        $i++;
    }
    return $str;
}

function argumentsToStringOnlyValue($arguments): string
{
    $str = '';
    foreach ($arguments as $key => $argument) {
        if (gettype($argument) == 'string') {
            $str .= '"' . $argument . '"';
        } else if (gettype($argument) == 'boolean') {
            $str .= $argument ? 'true' : 'false';
        } else {
            $str .= $argument;
        }
        $str .= ', ';
    }

    return $str;
}
