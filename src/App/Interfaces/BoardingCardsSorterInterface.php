<?php

namespace src\App\Interfaces;


interface BoardingCardsSorterInterface
{

    /**
     * @param array $boardingCards
     * @return array
     */
    public function sort(array $boardingCards);

}