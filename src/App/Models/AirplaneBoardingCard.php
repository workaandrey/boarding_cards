<?php
namespace src\App\Models;

/**
 * Class AirplaneBoardingCard
 * @package src\App\Models
 */
class AirplaneBoardingCard extends BaseBoardingCard
{
    protected $gate;

    /**
     * BaseBoardingCard constructor.
     * @param string $vehicle
     * @param string $source
     * @param string $destination
     * @param string $vehicleNumber
     * @param mixed $seatAssignment
     * @param mixed $gate
     */
    public function __construct($vehicle, $source, $destination, $vehicleNumber = null, $seatAssignment = null, $gate = null)
    {
        parent::__construct($vehicle, $source, $destination, $vehicleNumber, $seatAssignment);

        $this->gate = $gate;
    }

    /**
     * @return string
     */
    public function getGate()
    {
        return $this->gate;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $vehicleNumber = !empty($this->vehicleNumber) ? "{$this->vehicleNumber} " : '';
        $gateInfo = !empty($this->gate) ? " Gate {$this->gate}. " : "";
        $seatInfo = empty($this->seatAssignment) ? 'No seat assignment.' : "Sit in seat {$this->seatAssignment}.";
        return "{$this->vehicle} {$vehicleNumber}from {$this->source} to {$this->destination}. {$gateInfo}{$seatInfo}";
    }

}