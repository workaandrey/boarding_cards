<?php
require_once 'vendor/autoload.php';

use src\App\Trip;

if(empty($argv[1])) {
    exit('You did not provided boarding cards in json format');
}

$boardingCardsData = json_decode($argv[1], true);
if(json_last_error() !== JSON_ERROR_NONE) {
    exit('You have provided invalid json');
}

$trip = new Trip();
$trip->addBoardingCards($boardingCardsData);

$trip->showRoute();
echo PHP_EOL;