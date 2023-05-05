<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class FunctionTemplate implements Template
{

    public string $name;
    public array $arguments;
    public array $actions;
    public string $lang;
    public string $template = '';

    public function __construct(string $name, array $arguments, array $actions, $lang = 'php')
    {
        $this->name = $name;
        $this->actions = $actions;
        $this->arguments = $arguments;
        $this->lang = $lang;

        $this->template = $this->fill();
    }

    public function argumentsToString($arguments): string
    {
        return argumentsToString($arguments);
    }

    public function fill(): string
    {
        $args = [
            'name' => $this->name,
            'arguments' => $this->argumentsToString($this->arguments),
            'body' => 'nimadur'
        ];

        return Filler::fill(getTemplate('function', $this->lang), $args);
    }

}
