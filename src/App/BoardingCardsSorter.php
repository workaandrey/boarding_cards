<?php

namespace src\App;

use src\App\Interfaces\BoardingCardsSorterInterface;

/**
 * Class BoardingCardsSorter
 * @package src\App
 */
class BoardingCardsSorter implements BoardingCardsSorterInterface
{

    /**
     * @param array $boardingCards
     * @return array
     */
    public function sort(array $boardingCards)
    {
        $sortedBoardingCards = [];
        return $sortedBoardingCards;
    }

}