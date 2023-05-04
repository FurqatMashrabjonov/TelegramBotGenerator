<?php


/**
 * @param string $name
 * @param string $lang
 * @return mixed
 */
function getTemplate(string $name, string $lang = 'php')
{
    return require public_path("telegram-templates/$lang/$name.php");
}
