<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class flightLegV1 {
  /* airportV1 */
  public $departureAirport;
  /* string */
  public $departureAirportFsCode;
  /* airportV1 */
  public $arrivalAirport;
  /* string */
  public $arrivalAirportFsCode;
  /* string */
  public $departureTime;
  /* string */
  public $arrivalTime;
  /* int */
  public $departureDateAdjustment;
  /* int */
  public $arrivalDateAdjustment;
  /* string */
  public $departureTerminal;
  /* string */
  public $arrivalTerminal;
  /* airlineV1 */
  public $carrier;
  /* string */
  public $carrierFsCode;
  /* string */
  public $flightNumber;
  /* string */
  public $wetleaseInfo;
  /* boolean */
  public $codeshare;
  /* flightIdV1 */
  public $operator;
  /* codeshares */
  public $codeshares;
  /* stops */
  public $stops;
  /* stopCodes */
  public $stopCodes;
  /* equipment */
  public $equipment;
  /* equipmentCodes */
  public $equipmentCodes;
  /* int */
  public $distanceMiles;
  /* int */
  public $flightDurationMinutes;
  /* int */
  public $layoverDurationMinutes;
  /* ratings */
  public $ratings;
}

?>
