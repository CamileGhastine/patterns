<?php

namespace App\Observers;

use SplSubject, SplObserver;

class LogFile implements SplObserver
{
    public function __construct(private $fileName)
    {
    }

    public function update(SplSubject $subject): void
    {
        file_put_contents($this->fileName, $subject->total() . "\n");
    }

    /**
     * Get the value of fileName
     */ 
    public function getFileName()
    {
        return $this->fileName;
    }
}
