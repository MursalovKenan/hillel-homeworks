<?php

use BlackJack\Classes\PlayerHand;
use CardDeck\Deck;

include __DIR__ . '/../vendor/autoload.php';

$deck = new Deck();
$deck->shuffle();
$playerHand = new PlayerHand();
$dealerHand = new PlayerHand();

$dealerHand->takeACard($deck->getCard());
$playerHand->takeACard($deck->getCard());

$stdin = fopen('php://stdin', 'r');
$input = '';

$strDealerHand = $dealerHand->showCards() . 'closed card';

do{
    $playerHand->takeACard($deck->getCard());
    echo $strDealerHand . PHP_EOL;
    echo $playerHand->showCards() . $playerHand->getScore() . PHP_EOL;
    echo 'Do you wont more card: ';
    $input = trim(fgets($stdin));
    if ($playerHand->getScore() > 21) {
        echo 'You lose';
        exit();
    }
} while ($input != 'no');

do{
    $dealerHand->takeACard($deck->getCard());
} while ($dealerHand->getScore() <= 21 || $playerHand->getScore() > $dealerHand->getScore());

echo $dealerHand->showCards() . $playerHand->getScore() . PHP_EOL;
echo $playerHand->showCards() . $playerHand->getScore() . PHP_EOL;

if ($dealerHand->getScore() <= 21 && $playerHand->getScore() < $dealerHand->getScore()) {
    echo 'You lose';
} else {
    echo 'You winner';
}