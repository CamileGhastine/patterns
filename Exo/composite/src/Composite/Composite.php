<?php

namespace App\Composite;

use App\Composite\Component;

abstract class Composite extends Component
{
    protected $children;

    public function __construct()
    {
        $this->children = new \SplObjectStorage();
    }

    public function add(Component $c): void
    {
        $this->children->attach($c);
    }

    public function remove(Component $c): void
    {
        $this->children->detach($c);
    }

    public function get(): \SplObjectStorage
    {
        return $this->children;
    }

    protected function getChilds(): string
    {
        $composite = "";
        foreach ($this->children as $child) {
            $composite .= $child->operation();
        }

        return $composite;
    }

    public function __toString()
    {
        return $this->operation();
    }
}
