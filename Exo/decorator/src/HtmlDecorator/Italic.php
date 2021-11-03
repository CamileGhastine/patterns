<?php

namespace App\HtmlDecorator;

class Italic extends TextDecorator
{

    public function __construct(protected TextElement $element)
    {
        $this->text = "<em>". $element->getText() ."</em>";
    }

    public function __toString()
    {
        return  $this->text;
    }
}