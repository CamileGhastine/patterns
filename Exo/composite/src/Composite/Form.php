<?php

namespace App\Composite;

use App\Composite\Composite;

class Form extends Composite
{
    protected $children;

    public function __construct(private string $name, private string $action)
    {
        $this->children = new \SplObjectStorage();
    }

    public function operation(): string
    {
        return "<form action=\"{$this->action}\" method=\"post\" name=\"{$this->name}\">\n" .
            $this->getChilds() .
            "</form>\n";
    }
}
