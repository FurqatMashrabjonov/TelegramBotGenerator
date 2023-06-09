<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class SendChatActionTemplate implements Template
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
        return Filler::fill(getTemplate('sendChatAction'), $this->arguments);
    }
}
