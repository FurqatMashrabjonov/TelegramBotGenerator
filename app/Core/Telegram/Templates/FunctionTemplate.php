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
    public string $actionsTemplate = '';

    public function __construct(string $name, array $arguments, array $actions, $lang = 'php')
    {
        $this->name = $name;
        $this->actions = $actions;
        $this->arguments = $arguments;
        array_unshift($this->arguments, 'bot');
        $this->lang = $lang;

        $this->makeActions();
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
            'body' => $this->actionsTemplate
        ];

        return Filler::fill(getTemplate('function', $this->lang), $args);
    }

    public function makeActions(): void{
        foreach ($this->actions as $action){
            $className = 'App\\Core\\Telegram\\Templates\\' . ucfirst($action->name).'Template';
            $this->actionsTemplate .= (new $className((array)$action->arguments))->template . PHP_EOL . '      ';
        }
    }
}
