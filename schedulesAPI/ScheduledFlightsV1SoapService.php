<?php
/**
 * ScheduledFlightsV1SoapService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * byFlight_Arriving class
 */
require_once 'byFlight_Arriving.php';
/**
 * byFlight_ArrivingResponse class
 */
require_once 'byFlight_ArrivingResponse.php';
/**
 * responseByFlight class
 */
require_once 'responseByFlight.php';
/**
 * responseBase class
 */
require_once 'responseBase.php';
/**
 * scheduledFlights class
 */
require_once 'scheduledFlights.php';
/**
 * requestByFlight class
 */
require_once 'requestByFlight.php';
/**
 * requestBase class
 */
require_once 'requestBase.php';
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
 * scheduledFlightV1 class
 */
require_once 'scheduledFlightV1.php';
/**
 * serviceClasses class
 */
require_once 'serviceClasses.php';
/**
 * trafficRestrictions class
 */
require_once 'trafficRestrictions.php';
/**
 * codeshares class
 */
require_once 'codeshares.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
/**
 * equipmentV1 class
 */
require_once 'equipmentV1.php';
/**
 * operatorV1 class
 */
require_once 'operatorV1.php';
/**
 * serviceClasses class
 */
require_once 'serviceClasses.php';
/**
 * trafficRestrictions class
 */
require_once 'trafficRestrictions.php';
/**
 * codeshareV1 class
 */
require_once 'codeshareV1.php';
/**
 * serviceClasses class
 */
require_once 'serviceClasses.php';
/**
 * trafficRestrictions class
 */
require_once 'trafficRestrictions.php';
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
 * equipments class
 */
require_once 'equipments.php';
/**
 * apiResponseError class
 */
require_once 'apiResponseError.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * byAirport_Arriving class
 */
require_once 'byAirport_Arriving.php';
/**
 * byAirport_ArrivingResponse class
 */
require_once 'byAirport_ArrivingResponse.php';
/**
 * responseByAirport class
 */
require_once 'responseByAirport.php';
/**
 * requestByAirport class
 */
require_once 'requestByAirport.php';
/**
 * requestedAirportV1 class
 */
require_once 'requestedAirportV1.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * byRoute_Arriving class
 */
require_once 'byRoute_Arriving.php';
/**
 * byRoute_ArrivingResponse class
 */
require_once 'byRoute_ArrivingResponse.php';
/**
 * responseByRoute class
 */
require_once 'responseByRoute.php';
/**
 * requestByRoute class
 */
require_once 'requestByRoute.php';
/**
 * byRoute_Departing class
 */
require_once 'byRoute_Departing.php';
/**
 * byRoute_DepartingResponse class
 */
require_once 'byRoute_DepartingResponse.php';
/**
 * byAirport_Departing class
 */
require_once 'byAirport_Departing.php';
/**
 * byAirport_DepartingResponse class
 */
require_once 'byAirport_DepartingResponse.php';
/**
 * byFlight_Departing class
 */
require_once 'byFlight_Departing.php';
/**
 * byFlight_DepartingResponse class
 */
require_once 'byFlight_DepartingResponse.php';

/**
 * ScheduledFlightsV1SoapService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class ScheduledFlightsV1SoapService extends SoapClient {

  public function ScheduledFlightsV1SoapService($wsdl = "schedulesAPI/scheduledFlightsService.wsdl", $options = array( 'trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE )) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param byRoute_Arriving $parameters
   * @return byRoute_ArrivingResponse
   */
  public function byRoute_Arriving(byRoute_Arriving $parameters) {
    return $this->__call('byRoute_Arriving', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.schedules.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byAirport_Departing $parameters
   * @return byAirport_DepartingResponse
   */
  public function byAirport_Departing(byAirport_Departing $parameters) {
    return $this->__call('byAirport_Departing', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.schedules.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byRoute_Departing $parameters
   * @return byRoute_DepartingResponse
   */
  public function byRoute_Departing(byRoute_Departing $parameters) {
    return $this->__call('byRoute_Departing', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.schedules.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byFlight_Arriving $parameters
   * @return byFlight_ArrivingResponse
   */
  public function byFlight_Arriving(byFlight_Arriving $parameters) {
    return $this->__call('byFlight_Arriving', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.schedules.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byFlight_Departing $parameters
   * @return byFlight_DepartingResponse
   */
  public function byFlight_Departing(byFlight_Departing $parameters) {
    return $this->__call('byFlight_Departing', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.schedules.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byAirport_Arriving $parameters
   * @return byAirport_ArrivingResponse
   */
  public function byAirport_Arriving(byAirport_Arriving $parameters) {
    return $this->__call('byAirport_Arriving', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.schedules.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
