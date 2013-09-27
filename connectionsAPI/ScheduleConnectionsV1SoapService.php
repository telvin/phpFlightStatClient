<?php
/**
 * ScheduleConnectionsV1SoapService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * directFlightsDeparting class
 */
require_once 'directFlightsDeparting.php';
/**
 * directFlightsDepartingResponse class
 */
require_once 'directFlightsDepartingResponse.php';
/**
 * responseFlight class
 */
require_once 'responseFlight.php';
/**
 * flightResponseV1 class
 */
require_once 'flightResponseV1.php';
/**
 * flights class
 */
require_once 'flights.php';
/**
 * requestFlight class
 */
require_once 'requestFlight.php';
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
 * requestedFlightNumber class
 */
require_once 'requestedFlightNumber.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
/**
 * requestedAirportOrMetro class
 */
require_once 'requestedAirportOrMetro.php';
/**
 * requestedAirportV1 class
 */
require_once 'requestedAirportV1.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
/**
 * requestedDate class
 */
require_once 'requestedDate.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * requestedEnum class
 */
require_once 'requestedEnum.php';
/**
 * flightV1 class
 */
require_once 'flightV1.php';
/**
 * departureDaysOfWeek class
 */
require_once 'departureDaysOfWeek.php';
/**
 * flightLegs class
 */
require_once 'flightLegs.php';
/**
 * flightLegV1 class
 */
require_once 'flightLegV1.php';
/**
 * codeshares class
 */
require_once 'codeshares.php';
/**
 * stops class
 */
require_once 'stops.php';
/**
 * stopCodes class
 */
require_once 'stopCodes.php';
/**
 * equipment class
 */
require_once 'equipment.php';
/**
 * equipmentCodes class
 */
require_once 'equipmentCodes.php';
/**
 * ratings class
 */
require_once 'ratings.php';
/**
 * flightIdV1 class
 */
require_once 'flightIdV1.php';
/**
 * equipmentV1 class
 */
require_once 'equipmentV1.php';
/**
 * ratingV1 class
 */
require_once 'ratingV1.php';
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
 * connectingFlightsForRouteByDeparture class
 */
require_once 'connectingFlightsForRouteByDeparture.php';
/**
 * connectingFlightsForRouteByDepartureResponse class
 */
require_once 'connectingFlightsForRouteByDepartureResponse.php';
/**
 * responseRoute class
 */
require_once 'responseRoute.php';
/**
 * requestRoute class
 */
require_once 'requestRoute.php';
/**
 * directFlightsDepartingOnDate class
 */
require_once 'directFlightsDepartingOnDate.php';
/**
 * directFlightsDepartingOnDateResponse class
 */
require_once 'directFlightsDepartingOnDateResponse.php';
/**
 * responseAirport class
 */
require_once 'responseAirport.php';
/**
 * requestAirport class
 */
require_once 'requestAirport.php';
/**
 * directFlightsArriving class
 */
require_once 'directFlightsArriving.php';
/**
 * directFlightsArrivingResponse class
 */
require_once 'directFlightsArrivingResponse.php';
/**
 * connectingFlightsForRouteByArrival class
 */
require_once 'connectingFlightsForRouteByArrival.php';
/**
 * connectingFlightsForRouteByArrivalResponse class
 */
require_once 'connectingFlightsForRouteByArrivalResponse.php';
/**
 * directFlightsArrivingOnDate class
 */
require_once 'directFlightsArrivingOnDate.php';
/**
 * directFlightsArrivingOnDateResponse class
 */
require_once 'directFlightsArrivingOnDateResponse.php';
/**
 * directFlightsDepartingAirport class
 */
require_once 'directFlightsDepartingAirport.php';
/**
 * directFlightsDepartingAirportResponse class
 */
require_once 'directFlightsDepartingAirportResponse.php';
/**
 * directFlightsArrivingAirport class
 */
require_once 'directFlightsArrivingAirport.php';
/**
 * directFlightsArrivingAirportResponse class
 */
require_once 'directFlightsArrivingAirportResponse.php';
/**
 * flightType class
 */
require_once 'flightType.php';
/**
 * simpleServiceType class
 */
require_once 'simpleServiceType.php';

/**
 * ScheduleConnectionsV1SoapService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class ScheduleConnectionsV1SoapService extends SoapClient {

  public function ScheduleConnectionsV1SoapService($wsdl = "schedulesAPI/schedulesConnectionsService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param directFlightsDepartingAirport $parameters
   * @return directFlightsDepartingAirportResponse
   */
  public function directFlightsDepartingAirport(directFlightsDepartingAirport $parameters) {
    return $this->__call('directFlightsDepartingAirport', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param directFlightsArrivingAirport $parameters
   * @return directFlightsArrivingAirportResponse
   */
  public function directFlightsArrivingAirport(directFlightsArrivingAirport $parameters) {
    return $this->__call('directFlightsArrivingAirport', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param directFlightsDepartingOnDate $parameters
   * @return directFlightsDepartingOnDateResponse
   */
  public function directFlightsDepartingOnDate(directFlightsDepartingOnDate $parameters) {
    return $this->__call('directFlightsDepartingOnDate', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param directFlightsArriving $parameters
   * @return directFlightsArrivingResponse
   */
  public function directFlightsArriving(directFlightsArriving $parameters) {
    return $this->__call('directFlightsArriving', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param directFlightsDeparting $parameters
   * @return directFlightsDepartingResponse
   */
  public function directFlightsDeparting(directFlightsDeparting $parameters) {
    return $this->__call('directFlightsDeparting', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param directFlightsArrivingOnDate $parameters
   * @return directFlightsArrivingOnDateResponse
   */
  public function directFlightsArrivingOnDate(directFlightsArrivingOnDate $parameters) {
    return $this->__call('directFlightsArrivingOnDate', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param connectingFlightsForRouteByDeparture $parameters
   * @return connectingFlightsForRouteByDepartureResponse
   */
  public function connectingFlightsForRouteByDeparture(connectingFlightsForRouteByDeparture $parameters) {
    return $this->__call('connectingFlightsForRouteByDeparture', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param connectingFlightsForRouteByArrival $parameters
   * @return connectingFlightsForRouteByArrivalResponse
   */
  public function connectingFlightsForRouteByArrival(connectingFlightsForRouteByArrival $parameters) {
    return $this->__call('connectingFlightsForRouteByArrival', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.api.connections.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
