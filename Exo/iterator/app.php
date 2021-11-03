<?php

require_once(__DIR__ . '/vendor/autoload.php');

use App\Model\Person;
use App\ReadIterator;

$relationships = new ReadIterator(__DIR__ . '/Data/relationships.txt');
$populations = new ReadIterator(__DIR__ . '/Data/populations.txt');

$storage = new Ds\Map();
$total = 0;

foreach ($populations as [$id, $name]) {
    $person = new Person(name: $name, id: $id, relation: []);
    $storage->put((int)$id, $person);
    $total += 1;
}

foreach ($relationships as [$i, $j]) {
    $storage->get((int)$i)->setRelation($storage->get((int)$j));
    $storage->get((int)$j)->setRelation($storage->get((int)$i));
}

//Calcul de la moyenne
$avg_relation = round($storage->reduce(function ($accumulator, $id, $population) {
    return $accumulator + count($population->getRelation());
}, 0) / $total, 2);

echo $avg_relation;