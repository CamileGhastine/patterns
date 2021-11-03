<?php

namespace App\Composite;

use App\Composite\Composite;

class Wrapper extends Composite
{

    public function operation(): string
    {
        return "<div>\n" .
            $this->getChilds() .
            "</div>\n";
    }
}
