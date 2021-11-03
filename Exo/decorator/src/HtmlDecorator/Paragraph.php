<?php

namespace App\HtmlDecorator;

class Paragraph extends TextDecorator
{
    
    public function __construct(protected TextElement $element)
    {
        $this->text = "<p>". $element->getText() ."</p>";

    }

    public function __toString()
    {
        return  $this->text;
    }
}