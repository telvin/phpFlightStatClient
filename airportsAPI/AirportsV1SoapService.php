<?php
/**
 * AirportsV1SoapService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * airportsByIcao class
 */
require_once 'airportsByIcao.php';
/**
 * airportsByIcaoResponse class
 */
require_once 'airportsByIcaoResponse.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * airportByIata class
 */
require_once 'airportByIata.php';
/**
 * airportByIataResponse class
 */
require_once 'airportByIataResponse.php';
/**
 * airportsByIata class
 */
require_once 'airportsByIata.php';
/**
 * airportsByIataResponse class
 */
require_once 'airportsByIataResponse.php';
/**
 * airportByFsCode class
 */
require_once 'airportByFsCode.php';
/**
 * airportByFsCodeResponse class
 */
require_once 'airportByFsCodeResponse.php';
/**
 * airportByIcao class
 */
require_once 'airportByIcao.php';
/**
 * airportByIcaoResponse class
 */
require_once 'airportByIcaoResponse.php';
/**
 * currentAirports class
 */
require_once 'currentAirports.php';
/**
 * currentAirportsResponse class
 */
require_once 'currentAirportsResponse.php';
/**
 * countryCode_airports class
 */
require_once 'countryCode_airports.php';
/**
 * countryCode_airportsResponse class
 */
require_once 'countryCode_airportsResponse.php';
/**
 * airports class
 */
require_once 'airports.php';
/**
 * airportsResponse class
 */
require_once 'airportsResponse.php';
/**
 * anyCode_airportForDay class
 */
require_once 'anyCode_airportForDay.php';
/**
 * anyCode_airportForDayResponse class
 */
require_once 'anyCode_airportForDayResponse.php';
/**
 * radius_airports class
 */
require_once 'radius_airports.php';
/**
 * radius_airportsResponse class
 */
require_once 'radius_airportsResponse.php';
/**
 * allAirports class
 */
require_once 'allAirports.php';
/**
 * allAirportsResponse class
 */
require_once 'allAirportsResponse.php';
/**
 * anyCode_currentAirport class
 */
require_once 'anyCode_currentAirport.php';
/**
 * anyCode_currentAirportResponse class
 */
require_once 'anyCode_currentAirportResponse.php';
/**
 * cityCode_airports class
 */
require_once 'cityCode_airports.php';
/**
 * cityCode_airportsResponse class
 */
require_once 'cityCode_airportsResponse.php';

/**
 * AirportsV1SoapService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class AirportsV1SoapService extends SoapClient {

  public function AirportsV1SoapService($wsdl = "airportsAPI/airportsService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param airportsByIata $parameters
   * @return airportsByIataResponse
   */
  public function airportsByIata(airportsByIata $parameters) {
    return $this->__call('airportsByIata', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param airportsByIcao $parameters
   * @return airportsByIcaoResponse
   */
  public function airportsByIcao(airportsByIcao $parameters) {
    return $this->__call('airportsByIcao', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param anyCode_currentAirport $parameters
   * @return anyCode_currentAirportResponse
   */
  public function anyCode_currentAirport(anyCode_currentAirport $parameters) {
    return $this->__call('anyCode_currentAirport', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param allAirports $parameters
   * @return allAirportsResponse
   */
  public function allAirports(allAirports $parameters) {
    return $this->__call('allAirports', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param airportByFsCode $parameters
   * @return airportByFsCodeResponse
   */
  public function airportByFsCode(airportByFsCode $parameters) {
    return $this->__call('airportByFsCode', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param airportByIata $parameters
   * @return airportByIataResponse
   */
  public function airportByIata(airportByIata $parameters) {
    return $this->__call('airportByIata', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param anyCode_airportForDay $parameters
   * @return anyCode_airportForDayResponse
   */
  public function anyCode_airportForDay(anyCode_airportForDay $parameters) {
    return $this->__call('anyCode_airportForDay', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param cityCode_airports $parameters
   * @return cityCode_airportsResponse
   */
  public function cityCode_airports(cityCode_airports $parameters) {
    return $this->__call('cityCode_airports', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param countryCode_airports $parameters
   * @return countryCode_airportsResponse
   */
  public function countryCode_airports(countryCode_airports $parameters) {
    return $this->__call('countryCode_airports', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param radius_airports $parameters
   * @return radius_airportsResponse
   */
  public function radius_airports(radius_airports $parameters) {
    return $this->__call('radius_airports', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param currentAirports $parameters
   * @return currentAirportsResponse
   */
  public function currentAirports(currentAirports $parameters) {
    return $this->__call('currentAirports', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param airportByIcao $parameters
   * @return airportByIcaoResponse
   */
  public function airportByIcao(airportByIcao $parameters) {
    return $this->__call('airportByIcao', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param airports $parameters
   * @return airportsResponse
   */
  public function airports(airports $parameters) {
    return $this->__call('airports', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.airports.cache.conducivetech.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
