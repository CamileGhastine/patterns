<?php

use App\HtmlDecorator\Text;
use App\HtmlDecorator\Paragraph;
use App\HtmlDecorator\Italic;
use PHPUnit\Framework\TestCase;

class ParagraphTest extends TestCase
{
    protected Text $text;
    protected Paragraph $paragraph;
   
    public function setUp(): void
    {
        $this->text = new Text('Hello Word');
    }

    /**
     * @test test l'ajout de la balise <p>
     */
    public function testParagraph(): void
    {
        $paragraph = new Paragraph($this->text);

        $this->assertSame((string)$paragraph, '<p>Hello Word</p>');
    }

    /**
     * @test test l'ajout de la balise <p> après l'ajout d'une autre balise
     */
    public function testParagraphWithAnOtherBalise(): void
    {
        $paragraph = new Paragraph(new Italic($this->text));

        $this->assertSame((string)$paragraph, '<p><em>Hello Word</em></p>');
    }
}
