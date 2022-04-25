<?php

namespace BlackJack\Classes;

use CardDeck\Deck;

class Game
{
    private Deck $deck;
    private Player $dealer;
    private Player $player;

    public function __construct()
    {
        $this->dealer = new Player('dealer');
        $this->player = new Player('player');
        $this->deck = new Deck();
        $this->deck->shuffle();
    }

    public function runGame()
    {

        $this->dealer->takeCard($this->deck->getCard());
        $this->player->takeCard($this->deck->getCard());

        $stdin = fopen('php://stdin', 'r');
        $strDealerHand = $this->dealer->getPlayerHand()->showCards() . 'closed card';

        do {
            $this->player->takeCard($this->deck->getCard());
            echo $this->dealer->getName() . ':   ' . $strDealerHand . PHP_EOL;
            echo $this->player->getName() . ':   ' . $this->player->getPlayerHand()->showCards() . $this->player->getScore()->getScore() . PHP_EOL;
            echo 'Do you wont more card ( write |no| to stop): ';
            $input = trim(fgets($stdin));
            if ($this->player->getScore()->getScore() > 21) {
                echo 'You lose' . PHP_EOL;
                exit();
            }
        } while ($input != 'no');

        while ($this->dealer->getScore()->getScore() < 21
            && $this->player->getScore()->getScore() > $this->dealer->getScore()->getScore()) {
            $this->dealer->takeCard($this->deck->getCard());
        }

        echo $this->dealer->getName() . ':   ' . $this->dealer->getPlayerHand()->showCards() . $this->dealer->getScore()->getScore() . PHP_EOL;
        echo $this->player->getName() . ':   ' . $this->player->getPlayerHand()->showCards() . $this->player->getScore()->getScore() . PHP_EOL;

        if ($this->dealer->getScore()->getScore() <= 21
            && $this->player->getScore()->getScore() < $this->dealer->getScore()->getScore()) {
            echo 'You lose' . PHP_EOL;
        } else {
            echo 'You WINNER' . PHP_EOL;
        }
    }
}