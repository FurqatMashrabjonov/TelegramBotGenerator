<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class SendMessageTemplate implements Template
{

   public array $arguments;
//    public ?string $parseMode;
//    public ?bool $disablePreview = false;
//    public ?string $messageThreadId = null;
//    public ?string $replyToMessageId = null;
//    public ?array $replyMarkup = null;
//    public ?bool $disableNotification = false;

    public string $template;

    public function __construct($arguments)
    {
        $this->arguments = $arguments;

        $this->template = $this->fill();
    }

    public function fill(): string
    {
        return Filler::fill(getTemplate('sendMessage'), $this->arguments);
    }
}
