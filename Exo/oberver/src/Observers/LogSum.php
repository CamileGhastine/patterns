<?php

namespace App\Observers;

use SplSubject, SplObserver;

class LogSum implements SplObserver
{
    private float $storage = 0;

    public function update( SplSubject $subject): void {
        $this->storage = $subject->total();
    }

    /**
     * Get the value of storage
     */ 
    public function getStorage(): float
    {
        return $this->storage;
    }
}

