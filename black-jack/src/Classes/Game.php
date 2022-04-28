<?php

namespace BlackJack\Classes;

use CardDeck\Deck;

class Game
{
    public static function runGame(): void
    {
        $dealer = new Player('dealer');
        $player = new Player('player');
        $deck = new Deck();
        $deck->shuffle();
        $dealer->takeCard($deck->getCard());
        $player->takeCard($deck->getCard());
        $dealerHand = $dealer->getPlayerHand();
        $playerHand = $player->getPlayerHand();
        $stdin = fopen('php://stdin', 'r');
        $strDealerHand = $dealerHand->showCards() . 'closed card';
        $playerScore = $player->getScore();
        $dealerScore = $dealer->getScore();
        $input = '';
        while ($input !== 'no') {

            $player->takeCard($deck->getCard());
            echo $dealer->getName() . ':   ' . $strDealerHand . PHP_EOL;
            echo $player->getName() . ':   ' . $playerHand->showCards() . $playerScore->getScore() . PHP_EOL;
            if ($playerScore->getScore() > 21) {
                echo 'You lose' . PHP_EOL;
                exit();
            }
            echo 'Do you wont more card ( write |no| to stop): ';
            $input = trim(fgets($stdin));
        }

        while ($dealerScore->getScore() < 21
            && $playerScore->getScore() > $dealerScore->getScore()) {
            $dealer->takeCard($deck->getCard());
        }

        echo $dealer->getName() . ':   ' . $dealerHand->showCards() . $dealerScore->getScore() . PHP_EOL;
        echo $player->getName() . ':   ' . $playerHand->showCards() . $playerScore->getScore() . PHP_EOL;

        if ($dealerScore->getScore() <= 21
            && $playerScore->getScore() < $dealerScore->getScore()) {
            echo 'You lose' . PHP_EOL;
        } else {
            echo 'You WINNER' . PHP_EOL;
        }
    }
}