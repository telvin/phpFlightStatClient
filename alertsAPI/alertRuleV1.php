<?php
/**
 * 
 * 
 * @package
 * @copyright
 */
class alertRuleV1 {
  /* string */
  public $id;
  /* string */
  public $name;
  /* string */
  public $description;
  /* string */
  public $carrierFsCode;
  /* airlineV1 */
  public $carrier;
  /* string */
  public $flightNumber;
  /* string */
  public $departureAirportFsCode;
  /* airportV1 */
  public $departureAirport;
  /* string */
  public $arrivalAirportFsCode;
  /* airportV1 */
  public $arrivalAirport;
  /* string */
  public $departure;
  /* string */
  public $arrival;
  /* ruleEvents */
  public $ruleEvents;
  /* nameValues */
  public $nameValues;
  /* alertDeliveryV1 */
  public $delivery;
}

?>
