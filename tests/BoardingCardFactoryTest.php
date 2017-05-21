<?php

use src\App\BoardingCardFactory;

class BoardingCardFactoryTest extends PHPUnit_Framework_TestCase
{

    /** @test */
    function it_throws_exception_when_pass_invalid_data_on_create()
    {
        $this->expectException('src\App\Exceptions\InvalidBoardingCardDataException');

        BoardingCardFactory::create([
            'foo' => 'bar',
        ]);
    }

    /** @test */
    function it_creates_boarding_card()
    {
        $boardingCard = BoardingCardFactory::create([
            'vehicle' => 'train',
            'source' => 'Madrid',
            'destination' => 'Barcelona',
            'vehicleNumber' => '78A',
            'seatAssignment' => '45B',
        ]);

        $this->assertInstanceOf('\src\App\Interfaces\BoardingCardInterface', $boardingCard);
    }

    /** @test */
    function it_creates_airplane_boarding_card()
    {
        $boardingCard = BoardingCardFactory::create([
            'vehicle' => 'airplane',
            'source' => 'Madrid',
            'destination' => 'Barcelona',
            'vehicleNumber' => '78A',
            'seatAssignment' => '45B',
        ]);

        $this->assertInstanceOf(\src\App\Models\AirplaneBoardingCard::class, $boardingCard);
    }
}