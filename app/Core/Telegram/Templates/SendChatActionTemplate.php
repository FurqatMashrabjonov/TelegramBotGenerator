<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class SendChatActionTemplate implements Template
{

   public array $arguments;
    public string $template;

    public function __construct($arguments)
    {
        $this->arguments = $arguments;

        $this->template = $this->fill();
    }

    public function fill(): string
    {
        return Filler::fill(getTemplate('sendChatAction'), $this->arguments);
    }
}
