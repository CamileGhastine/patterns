<?php

namespace App\HtmlDecorator;

use App\HtmlDecorator\TextElement;

class Text implements TextElement
{
    public function __construct(protected string $text)
    {
    }

    public function getText()
    {
        return $this->text;
    }

    public function __toString()
    {
        return $this->getText();
    }
}