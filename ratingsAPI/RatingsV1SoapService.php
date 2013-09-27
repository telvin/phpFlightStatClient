<?php
/**
 * RatingsV1SoapService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * byFlight class
 */
require_once 'byFlight.php';
/**
 * byFlightResponse class
 */
require_once 'byFlightResponse.php';
/**
 * responseFlight class
 */
require_once 'responseFlight.php';
/**
 * responseBase class
 */
require_once 'responseBase.php';
/**
 * ratings class
 */
require_once 'ratings.php';
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
 * requestedAirportV1 class
 */
require_once 'requestedAirportV1.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
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
 * apiResponseError class
 */
require_once 'apiResponseError.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * byRoute class
 */
require_once 'byRoute.php';
/**
 * byRouteResponse class
 */
require_once 'byRouteResponse.php';
/**
 * responseRoute class
 */
require_once 'responseRoute.php';
/**
 * requestRoute class
 */
require_once 'requestRoute.php';

/**
 * RatingsV1SoapService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class RatingsV1SoapService extends SoapClient {

  public function RatingsV1SoapService($wsdl = "E:\wamp\www\flightStatApiPhpClass\ratingsAPI\ratingsService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param byFlight $parameters
   * @return byFlightResponse
   */
  public function byFlight(byFlight $parameters) {
    return $this->__call('byFlight', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.ratings.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param byRoute $parameters
   * @return byRouteResponse
   */
  public function byRoute(byRoute $parameters) {
    return $this->__call('byRoute', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.ratings.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
