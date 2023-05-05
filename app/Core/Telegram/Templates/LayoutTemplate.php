<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Interfaces\Template;
use App\Core\Telegram\Templates\Layouts\FunctionLayoutTemplate;

class LayoutTemplate implements Template
{
    public array $functionTemplates;
    public array $commandTemplates;

    public string $functions;
    public string $commands;

    public function __construct($functionTemplates, $commandTemplates)
    {
        $this->commandTemplates = $commandTemplates;
        $this->functionTemplates = $functionTemplates;

        $this->fill();
    }

    public function fill(): string
    {
        $this->functions = new FunctionLayoutTemplate();
        $this->commands = new CommandLayoutTemplate();
    }
}
