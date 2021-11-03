<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\{Cart, Product};
use App\Observers\{LogFile, LogSum};

$cart = new Cart([]);

// Observers
$logFile = new LogFile;
$logSum = new LogSum;

// Ajoutez des produits ...
$cart->attach($logSum);
$cart->attach($logFile);

$apple = new Product('pomme', 1);
$banana = new Product('banane', 2);

$cart->buy($apple, 3);
$cart->buy($banana, 1);


// detach Observer
$cart->detach($logSum);
$cart->detach($logFile);


// recommandez des produits et vérifiez qu'ils ne sont pas de LogSum