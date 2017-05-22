<?php

namespace src\App;

use src\App\Interfaces\BoardingCardInterface;
use src\App\Interfaces\BoardingCardsSorterInterface;

/**
 * Class Trip
 * @package src\App
 */
class Trip
{

    /**
     * Trip boarding cards
     * @var array
     */
    private $boardingCards = [];

    /**
     * @var BoardingCardsSorterInterface
     */
    private $sorter;

    public function __construct($sorter = null)
    {
        if(!$sorter instanceof BoardingCardsSorterInterface) {
            $sorter = new BoardingCardsSorter();
        }
        $this->sorter = $sorter;
    }

    /**
     * Add multiple boarding cards to a trip
     * @param array $boardingCards
     */
    public function addBoardingCards(array $boardingCards)
    {
        foreach ($boardingCards as $boardingCard) {
            $this->addBoardingCard(BoardingCardFactory::create($boardingCard));
        }
    }

    /**
     * Add boarding card to a trip
     * @param BoardingCardInterface $boardingCard
     * @return $this;
     */
    public function addBoardingCard(BoardingCardInterface $boardingCard)
    {
        $this->boardingCards[] = $boardingCard;
    }

    /**
     * Get all boarding cards for a trip
     * @return array
     */
    public function getBoardingCards()
    {
        return $this->boardingCards;
    }

    /**
     * @return BoardingCardsSorterInterface
     */
    public function sorter()
    {
        return $this->sorter;
    }

    /**
     * @param BoardingCardsSorterInterface $sorter
     * @return BoardingCardsSorterInterface
     */
    public function setSorter(BoardingCardsSorterInterface $sorter)
    {
        return $this->sorter = $sorter;
    }

    /**
     * @return array
     */
    public function sortBoardingCards()
    {
        return $this->sorter()
            ->sort($this->getBoardingCards());
    }

    /**
     * Print route based on sorted boarding cards
     */
    public function showRoute()
    {
        foreach ($this->sortBoardingCards() as $i => $boardingCard) {
            echo ($i+1) ,'. ', 'Take ' . $boardingCard->toString(), PHP_EOL;
        }
        echo ($i+2), '. You have arrived at your final destination.';
    }

}