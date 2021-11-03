<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\HtmlDecorator\Text;
use App\HtmlDecorator\Italic;
use App\HtmlDecorator\Paragraph;

echo (new Paragraph((new Italic(new Text('hello world'))))); 