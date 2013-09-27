<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class scheduledFlightV1 {
  /* string */
  public $carrierFsCode;
  /* airlineV1 */
  public $carrier;
  /* string */
  public $flightNumber;
  /* string */
  public $brand;
  /* airportV1 */
  public $departureAirport;
  /* string */
  public $departureAirportFsCode;
  /* airportV1 */
  public $arrivalAirport;
  /* string */
  public $arrivalAirportFsCode;
  /* int */
  public $stops;
  /* string */
  public $departureTerminal;
  /* string */
  public $arrivalTerminal;
  /* string */
  public $departureTime;
  /* string */
  public $arrivalTime;
  /* string */
  public $flightEquipmentIataCode;
  /* equipmentV1 */
  public $flightEquipment;
  /* boolean */
  public $isCodeshare;
  /* boolean */
  public $isWetlease;
  /* string */
  public $serviceType;
  /* serviceClasses */
  public $serviceClasses;
  /* trafficRestrictions */
  public $trafficRestrictions;
  /* operatorV1 */
  public $operator;
  /* codeshares */
  public $codeshares;
  /* airlineV1 */
  public $wetleaseOperator;
  /* string */
  public $wetleaseOperatorFsCode;
  /* string */
  public $referenceCode;
}

?>
