<?php

namespace App\HtmlDecorator;

interface TextElement
{
    public function __toString();
    public function getText();
}