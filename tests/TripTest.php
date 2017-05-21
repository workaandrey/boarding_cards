<?php

use src\App\BoardingCardFactory;
use src\App\BoardingCardsSorter;
use src\App\Trip;

class TripTest extends PHPUnit_Framework_TestCase
{
    static protected $boardingCardsData = [
        [
            'vehicle' => 'train',
            'source' => 'Madrid',
            'destination' => 'Barcelona',
            'vehicleNumber' => '78A',
            'seatAssignment' => '45B',
        ],
        [
            'vehicle' => 'bus',
            'source' => 'Barcelona',
            'destination' => 'Gerona Airport',
            'vehicleNumber' => '',
            'seatAssignment' => '',
        ],
        [
            'vehicle' => 'airplane',
            'source' => 'Gerona Airport',
            'destination' => 'Stockholm',
            'vehicleNumber' => 'SK455',
            'seatAssignment' => '3A',
            'gate' => '45B',
        ],
    ];

    /** @test */
    function it_allows_to_add_boarding_card()
    {
        $boardingCard = BoardingCardFactory::create(self::$boardingCardsData[0]);
        $trip = new Trip();
        $trip->addBoardingCard($boardingCard);

        $this->assertArraySubset([$boardingCard], $trip->getBoardingCards());
    }

    /** @test */
    function it_allows_to_add_multiple_boarding_cards()
    {
        $boardingCards = [];
        foreach (self::$boardingCardsData as $boardingCardsDatum) {
            $boardingCards[] = BoardingCardFactory::create($boardingCardsDatum);
        }

        $trip = new Trip();
        $trip->addBoardingCards(self::$boardingCardsData);

        $this->assertArraySubset($boardingCards, $trip->getBoardingCards());
    }

    /** @test */
    function it_has_sorter()
    {
        $trip = new Trip();

        $this->assertInstanceOf('\src\App\Interfaces\BoardingCardsSorterInterface', $trip->sorter());
    }
}