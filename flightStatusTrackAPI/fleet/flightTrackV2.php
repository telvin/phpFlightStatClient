<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class flightTrackV2 {
  /* long */
  public $flightId;
  /* airlineV1 */
  public $carrier;
  /* string */
  public $carrierFsCode;
  /* string */
  public $flightNumber;
  /* string */
  public $tailNumber;
  /* string */
  public $callsign;
  /* airportV1 */
  public $departureAirport;
  /* string */
  public $departureAirportFsCode;
  /* airportV1 */
  public $arrivalAirport;
  /* string */
  public $arrivalAirportFsCode;
  /* dateInfoV2 */
  public $departureDate;
  /* string */
  public $equipment;
  /* int */
  public $delayMinutes;
  /* double */
  public $bearing;
  /* double */
  public $heading;
  /* positions */
  public $positions;
  /* waypoints */
  public $waypoints;
  /* string */
  public $legacyRoute;
}

?>
