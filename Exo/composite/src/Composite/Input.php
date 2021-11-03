<?php

namespace App\Composite;

use App\Composite\Component;

class Input extends Component
{
    public function __construct(private string $id, private string $name, private string $type)
    {
        
    }
    public function operation(): string
    {
        return "<input type=\"{$this->type}\" id=\"{$this->id}\" name=\"{$this->name}\">\n";
    }
}