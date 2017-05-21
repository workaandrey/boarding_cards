<?php
namespace src\App\Models;

use src\App\Interfaces\BoardingCardInterface;

/**
 * Class BaseBoardingCard
 * @package src\App\Models
 */
class BaseBoardingCard implements BoardingCardInterface
{
    protected $vehicle;

    protected $source;

    protected $destination;

    protected $vehicleNumber;

    protected $seatAssignment;

    /**
     * BaseBoardingCard constructor.
     * @param string $vehicle
     * @param string $source
     * @param string $destination
     * @param string $vehicleNumber
     * @param mixed $seatAssignment
     */
    public function __construct($vehicle, $source, $destination, $vehicleNumber = null, $seatAssignment = null)
    {
        $this->vehicle = $vehicle;
        $this->source = $source;
        $this->destination = $destination;
        $this->vehicleNumber = $vehicleNumber;
        $this->seatAssignment = $seatAssignment;
    }

    /**
     * @return string
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getVehicleNumber()
    {
        return $this->vehicleNumber;
    }

    /**
     * @return mixed|null
     */
    public function getSeatAssignment()
    {
        return $this->seatAssignment;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->source . ' - ' . $this->destination;
    }

}