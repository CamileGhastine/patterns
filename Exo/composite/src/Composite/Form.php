<?php

namespace App\Composite;

use App\Composite\Composite;

class Form extends Composite
{
    protected $children;

    public function __construct(private string $name, private string $action)
    {
       parent::__construct();
    }

    public function operation(): string
    {
        return "<form action=\"{$this->action}\" method=\"post\" name=\"{$this->name}\">\n" .
            parent::operation() .
            "</form>\n";
    }
}
