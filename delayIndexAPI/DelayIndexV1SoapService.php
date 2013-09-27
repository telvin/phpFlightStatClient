<?php
/**
 * DelayIndexV1SoapService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * forRegion class
 */
require_once 'forRegion.php';
/**
 * forRegionResponse class
 */
require_once 'forRegionResponse.php';
/**
 * responseRegion class
 */
require_once 'responseRegion.php';
/**
 * responseBase class
 */
require_once 'responseBase.php';
/**
 * delayIndexes class
 */
require_once 'delayIndexes.php';
/**
 * requestRegion class
 */
require_once 'requestRegion.php';
/**
 * requestFiltered class
 */
require_once 'requestFiltered.php';
/**
 * requestBase class
 */
require_once 'requestBase.php';
/**
 * requestedEnum class
 */
require_once 'requestedEnum.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * requestedDouble class
 */
require_once 'requestedDouble.php';
/**
 * delayIndexV1 class
 */
require_once 'delayIndexV1.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
/**
 * apiResponseError class
 */
require_once 'apiResponseError.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * forCountry class
 */
require_once 'forCountry.php';
/**
 * forCountryResponse class
 */
require_once 'forCountryResponse.php';
/**
 * responseCountry class
 */
require_once 'responseCountry.php';
/**
 * requestCountry class
 */
require_once 'requestCountry.php';
/**
 * forState class
 */
require_once 'forState.php';
/**
 * forStateResponse class
 */
require_once 'forStateResponse.php';
/**
 * responseState class
 */
require_once 'responseState.php';
/**
 * requestState class
 */
require_once 'requestState.php';
/**
 * forAirport class
 */
require_once 'forAirport.php';
/**
 * forAirportResponse class
 */
require_once 'forAirportResponse.php';
/**
 * responseAirports class
 */
require_once 'responseAirports.php';
/**
 * requestAirports class
 */
require_once 'requestAirports.php';
/**
 * airportCodes class
 */
require_once 'airportCodes.php';
/**
 * requestedAirportV1 class
 */
require_once 'requestedAirportV1.php';

/**
 * DelayIndexV1SoapService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class DelayIndexV1SoapService extends SoapClient {

  public function DelayIndexV1SoapService($wsdl = "E:\wamp\www\flightStatApiPhpClass\delayIndexAPI\delayIndexService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param forAirport $parameters
   * @return forAirportResponse
   */
  public function forAirport(forAirport $parameters) {
    return $this->__call('forAirport', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.delayindex.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param forCountry $parameters
   * @return forCountryResponse
   */
  public function forCountry(forCountry $parameters) {
    return $this->__call('forCountry', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.delayindex.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param forRegion $parameters
   * @return forRegionResponse
   */
  public function forRegion(forRegion $parameters) {
    return $this->__call('forRegion', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.delayindex.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param forState $parameters
   * @return forStateResponse
   */
  public function forState(forState $parameters) {
    return $this->__call('forState', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.delayindex.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
