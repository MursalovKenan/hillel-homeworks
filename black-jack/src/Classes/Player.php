<?php

namespace BlackJack\Classes;

use CardDeck\Classes\Card;

class Player
{
    private Hand $playerHand;
    private Score $score;
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->playerHand = new Hand();
        $this->score = new Score();
    }

    public function takeCard(Card $card)
    {
        $this->playerHand->takeACard($card);
        $this->score->countScore($this->playerHand->getCardInHand());
    }

    /**
     * @return Hand
     */
    public function getPlayerHand(): Hand
    {
        return $this->playerHand;
    }

    /**
     * @return Score
     */
    public function getScore(): Score
    {
        return $this->score;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}