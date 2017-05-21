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
     */
    public function __construct($vehicle, $source, $destination, $vehicleNumber = null, $seatAssignment = null, $gate = '')
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

}