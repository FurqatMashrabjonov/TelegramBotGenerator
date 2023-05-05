<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class SendMessageTemplate implements Template
{

    public string $chatId;
    public string $text;
//    public ?string $parseMode;
//    public ?bool $disablePreview = false;
//    public ?string $messageThreadId = null;
//    public ?string $replyToMessageId = null;
//    public ?array $replyMarkup = null;
//    public ?bool $disableNotification = false;

    public string $template;

    public function __construct(
        string $chatId,
        string $text,
//        ?string $parseMode,
//        ?bool   $disablePreview,
//        ?string $messageThreadId,
//        ?string $replyToMessageId,
//        ?array $replyMarkup,
//        ?bool $disableNotification
    )
    {
        $this->text = $text;
        $this->chatId = $chatId;
//        $this->parseMode = $parseMode;
//        $this->disablePreview = $disablePreview;
//        $this->replyToMessageId = $replyToMessageId;
//        $this->messageThreadId = $messageThreadId;
//        $this->replyMarkup = $replyMarkup;
//        $this->disableNotification = $disableNotification;

        $this->template = $this->fill();
    }

    public function fill(): string
    {
        $args = [
            'name' => 'sendMessage',
            'arguments' => argumentsToString(get_object_vars($this))
        ];

        print_r(get_object_vars($this));

        return Filler::fill('sendMessage', $args);
    }
}
