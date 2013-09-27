<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class flightV1 {
  /* airportV1 */
  public $departureAirport;
  /* string */
  public $departureAirportFsCode;
  /* airportV1 */
  public $arrivalAirport;
  /* string */
  public $arrivalAirportFsCode;
  /* string */
  public $departureDateFrom;
  /* string */
  public $departureDateTo;
  /* departureDaysOfWeek */
  public $departureDaysOfWeek;
  /* int */
  public $arrivalDateAdjustment;
  /* string */
  public $departureTime;
  /* string */
  public $arrivalTime;
  /* int */
  public $distanceMiles;
  /* int */
  public $flightDurationMinutes;
  /* int */
  public $layoverDurationMinutes;
  /* flightType */
  public $flightType;
  /* simpleServiceType */
  public $serviceType;
  /* boolean */
  public $online;
  /* flightLegs */
  public $flightLegs;
}

?>
