<?php

namespace BlackJack\Classes;

use CardDeck\Classes\Card;
use CardDeck\Classes\Nominal;

class PlayerHand
{
    private array $cardInHand;
    private int $score;

    public function __construct()
    {
        $this->cardInHand = [];
        $this->score = 0;
    }

    public function takeACard(Card $card)
    {
        $this->cardInHand[] = $card;
        $this->addScore($card);
    }

    public function showCards(): string
    {
        $hand = '';
        foreach ($this->cardInHand as $card) {
            $hand .= $card->printCardName() . ' | ';
        }
        return $hand;
    }

    private function addScore(Card $card)
    {
        $nominal = $card->getNominal()->value;
        if ($nominal >=2 && $nominal <= 10) {
            $this->score += (int) $nominal;
        } elseif ($nominal == Nominal::Ace->value) {
            if ($this->score > 10) {
                $this->score += 1;
            }else {
                $this->score += 11;
            }
        }else {
            $this->score +=  10;
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