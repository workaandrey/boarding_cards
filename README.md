[Boarding Cards Sorter]
==============================================
Description
----------------------------------------------
API that lets you sort boarding cards and present back a description of how to complete a journey

### Dependencies
- PHP 5.6

### Extending class
* You can use custom sorter instead of provided. For instance you can create a graph and use Dijkstra's algorithm
```
    $dijkstraSorter = new DijkstraBoardingCardsSorter();
    $trip = new Trip($dijkstraSorter);
```
* You can create your own boarding cards, e.g. BusBoardingCard or TrainBoardingCard or whatever you want. For instance check boarding_cards_trip/src/App/Models/AirplaneBoardingCard.php

Installation
------------
$ git clone git@bitbucket.org:work_a_andrey/boarding_cards_trip.git
$ composer install

Running tests
-------------
$ phpunit tests --colors


Usage
----------------------------------------------
```
<?php
require_once 'vendor/autoload.php';

use src\App\Trip;

$boardingCardsData = [
     [
         'vehicle' => 'airplane',
         'source' => 'Gerona Airport',
         'destination' => 'Stockholm',
         'vehicleNumber' => 'SK455',
         'seatAssignment' => '3A',
         'gate' => '45B',
     ],
     [
         'vehicle' => 'car',
         'source' => 'Stockholm',
         'destination' => 'Berlin',
         'vehicleNumber' => '',
         'seatAssignment' => '',
     ],
     [
         'vehicle' => 'bus',
         'source' => 'Barcelona',
         'destination' => 'Gerona Airport',
         'vehicleNumber' => '',
         'seatAssignment' => '',
     ],
     [
         'vehicle' => 'train',
         'source' => 'Berlin',
         'destination' => 'Moscow',
         'vehicleNumber' => '78A',
         'seatAssignment' => '45B',
     ],
     [
         'vehicle' => 'train',
         'source' => 'Madrid',
         'destination' => 'Barcelona',
         'vehicleNumber' => '78A',
         'seatAssignment' => '45B',
     ],
 ];

$trip = new Trip();
$trip->addBoardingCards($boardingCardsData);
$route = $trip->showRoute();
```

One just pass boarding cards in json format to script
```
php buildRoute.php '[{"vehicle":"airplane","source":"Gerona Airport","destination":"Stockholm","vehicleNumber":"SK455","seatAssignment":"3A","gate":"45B"},{"vehicle":"car","source":"Stockholm","destination":"Berlin","vehicleNumber":"","seatAssignment":""},{"vehicle":"bus","source":"Ba Airport","vehicleNumber":"","seatAssignment":""},{"vehicle":"train","source":"Berlin","destination":"Moscow","vehicleNumber":"78A","seatAssignment":"45B"},{"vehicle":"train","source":"Madrid","destination":"Barcelona","vehicleNumber":"78A","seatAssignment":"45B"}]'
```