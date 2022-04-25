<?php

namespace BlackJack\Classes;

use CardDeck\Classes\Card;

class Hand
{
    private array $cardInHand;

    public function __construct()
    {
        $this->cardInHand = [];
    }

    public function takeACard(Card $card)
    {
        $this->cardInHand[] = $card;
    }

    public function showCards(): string
    {
        $hand = '';
        foreach ($this->cardInHand as $card) {
            $hand .= $card->printCardName() . ' | ';
        }
        return $hand;
    }

    /**
     * @return array
     */
    public function getCardInHand(): array
    {
        return $this->cardInHand;
    }
}