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
    public ?string $from;

    public function __construct($arguments, $from)
    {
        $this->arguments = $arguments;
        $this->from = $from;

        $this->template = $this->fill();
    }

    public function fill(): string
    {
        if (!isset($this->arguments['chat_id']))
            $this->arguments['chat_id'] = '$message->getChat()->getId()';
        return Filler::fill(getTemplate('sendMessage'), $this->arguments);
    }
}
