<?php

namespace src\App;


use src\App\Exceptions\InvalidBoardingCardDataException;
use src\App\Interfaces\BoardingCardInterface;
use src\App\Models\AirplaneBoardingCard;
use src\App\Models\BaseBoardingCard;

/**
 * Class BoardingCardFactory
 * @package src\App
 */
class BoardingCardFactory
{

    /**
     * @param array $boardingCard
     * @return BoardingCardInterface
     * @throws InvalidBoardingCardDataException
     */
    public static function create(array $boardingCard)
    {
        $isValidBoardingCardData = !(empty($boardingCard['vehicle']) || empty($boardingCard['source']) || empty($boardingCard['destination'])
            || !isset($boardingCard['vehicleNumber']) || !isset($boardingCard['seatAssignment']));
        if(!$isValidBoardingCardData) {
            throw new InvalidBoardingCardDataException('Bad boarding card data');
        }

        switch ($boardingCard['vehicle'])
        {
            case 'airplane':
                return new AirplaneBoardingCard(
                    $boardingCard['vehicle'],
                    $boardingCard['source'],
                    $boardingCard['destination'],
                    $boardingCard['vehicleNumber'],
                    $boardingCard['seatAssignment'],
                    isset($boardingCard['gate']) ? $boardingCard['gate'] : ''
                );
            default:
                return new BaseBoardingCard(
                    $boardingCard['vehicle'],
                    $boardingCard['source'],
                    $boardingCard['destination'],
                    $boardingCard['vehicleNumber'],
                    $boardingCard['seatAssignment']
                );
        }

    }

}