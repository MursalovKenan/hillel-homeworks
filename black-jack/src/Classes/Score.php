<?php

namespace BlackJack\Classes;

use CardDeck\Classes\Card;
use CardDeck\Classes\Nominal;

class Score
{
    private int $score;

    public function countScore(array $cards)
    {
        $this->score = 0;
        foreach ($cards as $card) {
            $this->addScore($card);
        }
    }

    private function addScore(Card $card)
    {
        $nominal = $card->getNominal()->value;
        if ($nominal >= 2 && $nominal <= 10) {
            $this->score += (int)$nominal;
        } elseif ($nominal == Nominal::Ace->value) {
            $this->score += 11;
        } else {
            $this->score += 10;
        }

    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }
}