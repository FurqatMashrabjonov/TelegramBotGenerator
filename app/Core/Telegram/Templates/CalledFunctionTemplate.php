<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class CalledFunctionTemplate implements Template
{

    public array $arguments;

    public string $template;
    public ?string $from;

    public function __construct($arguments, $from)
    {
        $this->arguments = $arguments;
        $this->from = $from;

        $this->template = $this->fill();
    }

    public function fill(): string
    {
        $args = [
            'name' => match ($this->from) {
                    'function' => '$this->',
                    'command'  => '$function->'
                } . $this->arguments['name'],
            'arguments' => argumentsToStringOnlyValue($this->arguments['arguments'])
        ];
        return Filler::fill(getTemplate('calledFunction'), $args);
    }
}
