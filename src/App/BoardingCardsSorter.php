<?php

namespace src\App;

use src\App\Exceptions\BoardingCardsSorterException;
use src\App\Interfaces\BoardingCardsSorterInterface;

/**
 * Class BoardingCardsSorter
 * @package src\App
 */
class BoardingCardsSorter implements BoardingCardsSorterInterface
{

    /**
     * @param array $boardingCards
     * @return array|mixed
     * @throws BoardingCardsSorterException
     */
    public function sort(array $boardingCards){
        $sortedBoardingCards = [];
        $totalBoardingCards = count($boardingCards);

        $arraySort = function(array &$boardingCards, array &$sortedBoardingCards) use(&$arraySort)
        {
            if (!count($sortedBoardingCards)) {
                array_push($sortedBoardingCards, array_shift($boardingCards));
            }

            foreach ($boardingCards as $arrayIndex => $boardingCard) {
                $source = reset($sortedBoardingCards)->getSource();
                $destination = end($sortedBoardingCards)->getDestination();

                if ($destination == $boardingCard->getSource() || $source == $boardingCard->getDestination()) {
                    if ($boardingCard->getSource() == $destination) {
                        array_push($sortedBoardingCards, $boardingCard);
                    }
                    if ($boardingCard->getDestination() == $source) {
                        array_unshift($sortedBoardingCards, $boardingCard);
                    }
                    unset($boardingCards[$arrayIndex]);
                }
            }

            if (count($boardingCards)) {
                $arraySort($boardingCards, $sortedBoardingCards);
            }

            return $sortedBoardingCards;
        };

        $sortedBoardingCards = $arraySort($boardingCards, $sortedBoardingCards);

        if(count($sortedBoardingCards) != $totalBoardingCards) {
            throw new BoardingCardsSorterException('Can not sort boarding cards due to broken chain between all the legs');
        }

        return $sortedBoardingCards;
    }

}