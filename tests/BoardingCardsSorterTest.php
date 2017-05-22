<?php

use src\App\BoardingCardFactory;
use src\App\BoardingCardsSorter;

class BoardingCardsSorterTest extends PHPUnit_Framework_TestCase
{

    protected $boardingCards = [];

    public function setUp()
    {
        parent::setUp();

        $this->boardingCards = [
            BoardingCardFactory::create([
                'vehicle' => 'airplane',
                'source' => 'Gerona Airport',
                'destination' => 'Stockholm',
                'vehicleNumber' => 'SK455',
                'seatAssignment' => '3A',
                'gate' => '45B',
            ]),
            BoardingCardFactory::create([
                'vehicle' => 'car',
                'source' => 'Stockholm',
                'destination' => 'Berlin',
                'vehicleNumber' => '',
                'seatAssignment' => '',
            ]),
            BoardingCardFactory::create([
                'vehicle' => 'bus',
                'source' => 'Barcelona',
                'destination' => 'Gerona Airport',
                'vehicleNumber' => '',
                'seatAssignment' => '',
            ]),
            BoardingCardFactory::create([
                'vehicle' => 'train',
                'source' => 'Berlin',
                'destination' => 'Moscow',
                'vehicleNumber' => '78A',
                'seatAssignment' => '45B',
            ]),
            BoardingCardFactory::create([
                'vehicle' => 'train',
                'source' => 'Madrid',
                'destination' => 'Barcelona',
                'vehicleNumber' => '78A',
                'seatAssignment' => '45B',
            ]),
        ];
    }

    /** @test */
    function it_sorts_boarding_cards()
    {
        $sortedBoardingCards = [
            $this->boardingCards[4],
            $this->boardingCards[2],
            $this->boardingCards[0],
            $this->boardingCards[1],
            $this->boardingCards[3]
        ];
        $sorter = new BoardingCardsSorter();

        $this->assertTrue($sortedBoardingCards == $sorter->sort($this->boardingCards));
    }

}