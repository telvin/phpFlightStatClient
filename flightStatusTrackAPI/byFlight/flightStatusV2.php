<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class flightStatusV2 {
  /* long */
  public $flightId;
  /* airlineV1 */
  public $carrier;
  /* string */
  public $carrierFsCode;
  /* string */
  public $flightNumber;
  /* airportV1 */
  public $departureAirport;
  /* string */
  public $departureAirportFsCode;
  /* airportV1 */
  public $arrivalAirport;
  /* string */
  public $arrivalAirportFsCode;
  /* airportV1 */
  public $divertedAirport;
  /* string */
  public $divertedAirportFsCode;
  /* dateInfoV2 */
  public $departureDate;
  /* dateInfoV2 */
  public $arrivalDate;
  /* string */
  public $status;
  /* scheduleDataV2 */
  public $schedule;
  /* operationalTimesV2 */
  public $operationalTimes;
  /* codeshares */
  public $codeshares;
  /* delaysV2 */
  public $delays;
  /* flightDurationsV2 */
  public $flightDurations;
  /* airportResourcesV2 */
  public $airportResources;
  /* flightEquipmentV2 */
  public $flightEquipment;
  /* flightStatusUpdates */
  public $flightStatusUpdates;
}

?>
