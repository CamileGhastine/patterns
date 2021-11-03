<?php

namespace App;

use Exception;
use SplObjectStorage;
use SplSubject, SplObserver;

class Cart implements SplSubject
{
    private $storage;
    private $tva;
    private SplObjectStorage $obervers;

    public function __construct(array $storage = [], float $tva = 0.2)
    {
        $this->tva = $tva;
        $this->storage = $storage;
        $this->obervers = new SplObjectStorage;
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        if($this->observers->contains($observer))
            $this->obervers->detach($observer);
    }

    public function notify(): void
    {
        if(!$this->obervers->count()) throw new Exception('pas observer');

        foreach ($this->observers as $oberver) {
            $oberver->update($this);
        }
    }

    public function buy(Product $product, int $quantity): void
    {
        $total = $quantity * $product->getPrice() * ($this->tva + 1);

        $this->storage[$product->getName()] = $total;

        $this->notify();
    }

    public function reset(): void
    {
        $this->storage = [];

        $this->notify();
    }

    public function total(): float
    {
        return array_sum($this->storage);
    }

    public function restore(Product $product): void
    {
        if (isset($this->storage[$product->getName()])) {
            unset($this->storage[$product->getName()]);
        }

        $this->notify();
    }

    /**
     * Get the value of storage
     */ 
    public function getStorage()
    {
        return $this->storage;
    }
}
