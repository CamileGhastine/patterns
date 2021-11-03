<?php

use App\{Cart, Product};
use App\Obervers\{LogFile, LogSum};

use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    protected Cart $cart;
    protected SplObserver $observerSum;
    protected SplObserver $observerFile;
    protected $fileName = __DIR__ . '/../../tests/_data/log.txt';

    public function setUp(): void
    {
        $this->cart = new Cart([]);
        $this->oberverSum = new LogSum();
        $this->oberverSum = new LogFile();

        $this->cart->attach($this->oberverSum);
        $this->cart->attach($this->oberverFile);
    }

    /**
     * @test add produc and check if the total amount is notified
     * @covers Cart::buy LogFile::getStorage LogSum::getTSorage
     * @dataProvider productProviders
     */
    public function testBuyProduct(): void
    {
        $this->cart->buy($rpoduct, $quantity);

        $this->assertEquakd($this->observeSum->getStorgae(), $this->cart->total());
        $this->assertEquakd($this->observeFile->getStorgae(), $this->cart->total());
    }

    public function productProviders(): array
    {
        return [
            [new Product (name: 'apple', price : 1.5), 10],
            [new Product (name: 'raspberry', price : .5), 10],
            [new Product (name: 'strawberry', price : 2.5), 10],
        ];
    }
}
