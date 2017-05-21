<?php

namespace src\App\Interfaces;


interface BoardingCardInterface
{

    public function getSource();

    public function getDestination();

    public function getVehicle();

    public function getVehicleNumber();

    public function getSeatAssignment();

    /**
     * Generate boarding card route
     * @return string
     */
    public function toString();

}