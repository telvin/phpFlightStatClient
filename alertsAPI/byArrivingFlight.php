<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class byArrivingFlight {
  /* string */
  public $appId;
  /* string */
  public $appKey;
  /* string */
  public $carrier;
  /* string */
  public $flightNumber;
  /* string */
  public $arrivalAirport;
  /* int */
  public $year;
  /* int */
  public $month;
  /* int */
  public $day;
  /* string */
  public $name;
  /* string */
  public $desc;
  /* string */
  public $type; //The format of the alert data to be posted to the 'deliverTo' address: 'JSON' or 'XML'.
  /* string */
  public $deliverTo; // Where the alert data will be delivered - the URL of an HTTP/HTTPS service that accepts POST data. For testing and evaluation purposes (no production use, please), we will also deliver alert data via email if the URL is of the form smtp://username@domain.com.
  /* string */
  public $events;
  /* nameValueV1 */
  public $nameValue;
  /* string */
  public $codeType;
  /* string */
  public $extendedOptions;
}

?>
