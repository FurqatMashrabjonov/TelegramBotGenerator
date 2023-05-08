<?php

namespace App\Core\Telegram\Templates\Layouts;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class MainTemplate implements Template
{

    public array $templates;
    public string $token;
    public string $template = '';
    public function __construct($templates, $token){
        $this->templates = $templates;
        $this->token = $token;

        $this->template = $this->fill();
    }

    public function fill(): string
    {
        $body = '';
        foreach ($this->templates as $template) {
            $body .= $template . PHP_EOL . '   ';
        }
        $args = [
            'token' => $this->token,
            'body' => $body
        ];
        return Filler::fill(getTemplate('layouts/main'), $args);
    }
}
