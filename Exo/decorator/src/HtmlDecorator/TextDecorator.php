<?php

namespace App\HtmlDecorator;

use App\HtmlDecorator\TextElement;

abstract class TextDecorator implements TextElement
{    
    protected $text;

    public function __construct(protected TextElement $element)
    {
        $this->text = $element->getText();
    }

    public function getText()
    {
        return $this->text;
    }
}