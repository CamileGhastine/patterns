<?php

use App\HtmlDecorator\Text;
use App\HtmlDecorator\Italic;
use App\HtmlDecorator\Paragraph;
use PHPUnit\Framework\TestCase;

class ItalicTest extends TestCase
{
    protected Text $text;
    protected Italic $italic;
   
    public function setUp(): void
    {
        $this->text = new Text('Hello Word');
    }

    /**
     * @test test l'ajout de la balise <em>
     */
    public function testItalic(): void
    {
        $paragraph = new Italic($this->text);

        $this->assertSame((string)$paragraph, '<em>Hello Word</em>');
    }

        /**
     * @test test l'ajout de la balise <em> après l'ajout d'une autre balise
     */
    public function testtalicWithAnOtherBalise(): void
    {
        $italic = new Italic(new Paragraph($this->text));

        $this->assertSame((string)$italic, '<em><p>Hello Word</p></em>');
    }
}