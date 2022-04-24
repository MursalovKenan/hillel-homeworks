<?php

use CardDeck\Deck;

include __DIR__ . '/../vendor/autoload.php';
$deck = new Deck();
//$deck->shuffle();
for ($i = 0; $i < 52; $i++) {
    $card = $deck->getCard();
    echo $card->printCardName();
}