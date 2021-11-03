<?php


use App\Composite\Form;
use App\Composite\Input;
use PHPUnit\Framework\TestCase;

class CompositeTest extends TestCase
{
    private Form $form;

    public function setup(): void
    {
        $this->form = new Form(name: 'user', action: "/add");
    }

    public function testFormComposite()
    {
        $this->form->add(new Input(name: 'username', type: 'text', id: 'username'));
        $this->form->add(new Input(name: 'city', type: 'text', id: 'city'));

        $this->assertSame(
            (string)$this->form,
            '<form action="/add" method="post" name="user">' . "\n".
            '<input type="text" id="username" name="username">' . "\n" .
            '<input type="text" id="city" name="city">' . "\n" .
            '</form>' . "\n" 
        );
    }
}
