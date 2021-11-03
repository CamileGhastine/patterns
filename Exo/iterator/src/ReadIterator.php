<?php

namespace App;

use App\Model\Person;
use Iterator;

class ReadIterator implements Iterator
{
    private $pointer = '';
    private int $rowCounter = 0;
    
    public function __construct(
        private $file,
        private $separator = ',',

    ) {
        $this->pointer = fopen($file, 'r');
    }

    public function rewind(): void
    {
        $this->rowCounter = 0;
        rewind($this->pointer); //remet le pointeur au début
    }

    public function current()
    {
        $current = fgets($this->pointer, 4096);
        $this->rowCounter++;
        return explode($this->separator, $current);
    }

    public function key()
    {
        return $this->rowCounter;
    }

    public function next(): bool
    {
        return !feof($this->pointer);
    }

    public function valid()
    {
        if ($this->next()) return true;

        fclose($this->pointer);

        return false;
    }
}
