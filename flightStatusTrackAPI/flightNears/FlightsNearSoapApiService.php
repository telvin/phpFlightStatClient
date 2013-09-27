<?php
/**
 * FlightsNearSoapApiService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * flightsNear_box class
 */
require_once 'flightsNear_box.php';
/**
 * flightsNear_boxResponse class
 */
require_once 'flightsNear_boxResponse.php';
/**
 * responseFlightsNearBox class
 */
require_once 'responseFlightsNearBox.php';
/**
 * flightPositionResponse class
 */
require_once 'flightPositionResponse.php';
/**
 * flightPositions class
 */
require_once 'flightPositions.php';
/**
 * responseImpl class
 */
require_once 'responseImpl.php';
/**
 * requestFlightsNearBox class
 */
require_once 'requestFlightsNearBox.php';
/**
 * requestBase class
 */
require_once 'requestBase.php';
/**
 * requestedDouble class
 */
require_once 'requestedDouble.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
/**
 * flightPositionV2 class
 */
require_once 'flightPositionV2.php';
/**
 * positions class
 */
require_once 'positions.php';
/**
 * positionV2 class
 */
require_once 'positionV2.php';
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
 * equipments class
 */
require_once 'equipments.php';
/**
 * airlineV1 class
 */
require_once 'airlineV1.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
/**
 * equipmentV1 class
 */
require_once 'equipmentV1.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * flightsNear_radius class
 */
require_once 'flightsNear_radius.php';
/**
 * flightsNear_radiusResponse class
 */
require_once 'flightsNear_radiusResponse.php';
/**
 * responseFlightsNearRadius class
 */
require_once 'responseFlightsNearRadius.php';
/**
 * requestFlightsNearRadius class
 */
require_once 'requestFlightsNearRadius.php';

/**
 * FlightsNearSoapApiService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class FlightsNearSoapApiService extends SoapClient {

  public function FlightsNearSoapApiService($wsdl = "E:\wamp\www\signsmart2\protected\vendors\flightStatAPI\flightStatusTrackAPI\flightNears\flightsNearService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param flightsNear_box $parameters
   * @return flightsNear_boxResponse
   */
  public function flightsNear_box(flightsNear_box $parameters) {
    return $this->__call('flightsNear_box', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v2.api_internal.flighthistory.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param flightsNear_radius $parameters
   * @return flightsNear_radiusResponse
   */
  public function flightsNear_radius(flightsNear_radius $parameters) {
    return $this->__call('flightsNear_radius', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v2.api_internal.flighthistory.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
