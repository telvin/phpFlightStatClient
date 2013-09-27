<?php
/**
 * FlightAlertsV1SoapService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * byDepartingFlight class
 */
require_once 'byDepartingFlight.php';
/**
 * nameValueV1 class
 */
require_once 'nameValueV1.php';
/**
 * byDepartingFlightResponse class
 */
require_once 'byDepartingFlightResponse.php';
/**
 * responseFlight class
 */
require_once 'responseFlight.php';
/**
 * responseRule class
 */
require_once 'responseRule.php';
/**
 * requestFlight class
 */
require_once 'requestFlight.php';
/**
 * requestRuleCreate class
 */
require_once 'requestRuleCreate.php';
/**
 * events class
 */
require_once 'events.php';
/**
 * nameValues class
 */
require_once 'nameValues.php';
/**
 * requestBase class
 */
require_once 'requestBase.php';
/**
 * requestedAirportV1 class
 */
require_once 'requestedAirportV1.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
/**
 * requestedAirlineV1 class
 */
require_once 'requestedAirlineV1.php';
/**
 * airlineV1 class
 */
require_once 'airlineV1.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
/**
 * requestedDate class
 */
require_once 'requestedDate.php';
/**
 * requestedEnum class
 */
require_once 'requestedEnum.php';
/**
 * alertRuleV1 class
 */
require_once 'alertRuleV1.php';
/**
 * ruleEvents class
 */
require_once 'ruleEvents.php';
/**
 * nameValues class
 */
require_once 'nameValues.php';
/**
 * ruleEventV1 class
 */
require_once 'ruleEventV1.php';
/**
 * alertDeliveryV1 class
 */
require_once 'alertDeliveryV1.php';
/**
 * apiResponseError class
 */
require_once 'apiResponseError.php';
/**
 * appendices class
 */
require_once 'appendices.php';
/**
 * airlines class
 */
require_once 'airlines.php';
/**
 * airports class
 */
require_once 'airports.php';
/**
 * alertCapabilities class
 */
require_once 'alertCapabilities.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * byRouteArrival class
 */
require_once 'byRouteArrival.php';
/**
 * byRouteArrivalResponse class
 */
require_once 'byRouteArrivalResponse.php';
/**
 * responseRoute class
 */
require_once 'responseRoute.php';
/**
 * requestRoute class
 */
require_once 'requestRoute.php';
/**
 * deleteById class
 */
require_once 'deleteById.php';
/**
 * deleteByIdResponse class
 */
require_once 'deleteByIdResponse.php';
/**
 * responseRuleById class
 */
require_once 'responseRuleById.php';
/**
 * requestRuleById class
 */
require_once 'requestRuleById.php';
/**
 * getById class
 */
require_once 'getById.php';
/**
 * getByIdResponse class
 */
require_once 'getByIdResponse.php';
/**
 * listRuleIDs class
 */
require_once 'listRuleIDs.php';
/**
 * listRuleIDsResponse class
 */
require_once 'listRuleIDsResponse.php';
/**
 * responseRuleIds class
 */
require_once 'responseRuleIds.php';
/**
 * ruleIds class
 */
require_once 'ruleIds.php';
/**
 * requestRuleIds class
 */
require_once 'requestRuleIds.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * byArrivingFlight class
 */
require_once 'byArrivingFlight.php';
/**
 * byArrivingFlightResponse class
 */
require_once 'byArrivingFlightResponse.php';
/**
 * byRouteDeparture class
 */
require_once 'byRouteDeparture.php';
/**
 * byRouteDepartureResponse class
 */
require_once 'byRouteDepartureResponse.php';
/**
 * listRuleIDsLessThan class
 */
require_once 'listRuleIDsLessThan.php';
/**
 * listRuleIDsLessThanResponse class
 */
require_once 'listRuleIDsLessThanResponse.php';

/**
 * FlightAlertsV1SoapService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class FlightAlertsV1SoapService extends SoapClient {

  public function FlightAlertsV1SoapService($wsdl = "E:\wamp\www\flightStatApiPhpClass\alertsAPI\flightAlertsService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param byRouteDeparture $parameters
   * @return byRouteDepartureResponse
   */
  public function byRouteDeparture(byRouteDeparture $parameters) {
    return $this->__call('byRouteDeparture', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byRouteArrival $parameters
   * @return byRouteArrivalResponse
   */
  public function byRouteArrival(byRouteArrival $parameters) {
    return $this->__call('byRouteArrival', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param getById $parameters
   * @return getByIdResponse
   */
  public function getById(getById $parameters) {
    return $this->__call('getById', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param deleteById $parameters
   * @return deleteByIdResponse
   */
  public function deleteById(deleteById $parameters) {
    return $this->__call('deleteById', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byArrivingFlight $parameters
   * @return byArrivingFlightResponse
   */
  public function byArrivingFlight(byArrivingFlight $parameters) {
    return $this->__call('byArrivingFlight', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param listRuleIDs $parameters
   * @return listRuleIDsResponse
   */
  public function listRuleIDs(listRuleIDs $parameters) {
    return $this->__call('listRuleIDs', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param listRuleIDsLessThan $parameters
   * @return listRuleIDsLessThanResponse
   */
  public function listRuleIDsLessThan(listRuleIDsLessThan $parameters) {
    return $this->__call('listRuleIDsLessThan', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byDepartingFlight $parameters
   * @return byDepartingFlightResponse
   */
  public function byDepartingFlight(byDepartingFlight $parameters) {
    return $this->__call('byDepartingFlight', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.alerts.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
