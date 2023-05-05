<?php

namespace App\Core\Telegram\Interfaces;

interface Template
{

    /**
     * @return string
     */
    public function fill(): string;

//    public function argumentsToString($arguments): string;

}
