<?php
/**
 * WeatherV1SoapService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * taf_for_airport class
 */
require_once 'taf_for_airport.php';
/**
 * taf_for_airportResponse class
 */
require_once 'taf_for_airportResponse.php';
/**
 * tafResponseV1 class
 */
require_once 'tafResponseV1.php';
/**
 * responseImpl class
 */
require_once 'responseImpl.php';
/**
 * weatherRequestBaseV1 class
 */
require_once 'weatherRequestBaseV1.php';
/**
 * requestedAirportV1 class
 */
require_once 'requestedAirportV1.php';
/**
 * airportV1 class
 */
require_once 'airportV1.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
/**
 * tafV1 class
 */
require_once 'tafV1.php';
/**
 * forecasts class
 */
require_once 'forecasts.php';
/**
 * forecastV1 class
 */
require_once 'forecastV1.php';
/**
 * conditionsV1 class
 */
require_once 'conditionsV1.php';
/**
 * weatherConditions class
 */
require_once 'weatherConditions.php';
/**
 * skyConditions class
 */
require_once 'skyConditions.php';
/**
 * windV1 class
 */
require_once 'windV1.php';
/**
 * visibilityV1 class
 */
require_once 'visibilityV1.php';
/**
 * weatherConditionV1 class
 */
require_once 'weatherConditionV1.php';
/**
 * skyConditionV1 class
 */
require_once 'skyConditionV1.php';
/**
 * apiResponseError class
 */
require_once 'apiResponseError.php';
/**
 * appendices class
 */
require_once 'appendices.php';
/**
 * airports class
 */
require_once 'airports.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * metar_for_airport class
 */
require_once 'metar_for_airport.php';
/**
 * metar_for_airportResponse class
 */
require_once 'metar_for_airportResponse.php';
/**
 * metarResponseV1 class
 */
require_once 'metarResponseV1.php';
/**
 * metarV1 class
 */
require_once 'metarV1.php';
/**
 * tags class
 */
require_once 'tags.php';
/**
 * runwayVisualRanges class
 */
require_once 'runwayVisualRanges.php';
/**
 * obscurations class
 */
require_once 'obscurations.php';
/**
 * tagV1 class
 */
require_once 'tagV1.php';
/**
 * runwayVisualRangeV1 class
 */
require_once 'runwayVisualRangeV1.php';
/**
 * obscurationV1 class
 */
require_once 'obscurationV1.php';
/**
 * zoneForecasts class
 */
require_once 'zoneForecasts.php';
/**
 * zoneForecastsResponse class
 */
require_once 'zoneForecastsResponse.php';
/**
 * zoneForecastResponseV1 class
 */
require_once 'zoneForecastResponseV1.php';
/**
 * zoneForecastV1 class
 */
require_once 'zoneForecastV1.php';
/**
 * zones class
 */
require_once 'zones.php';
/**
 * cities class
 */
require_once 'cities.php';
/**
 * zoneNames class
 */
require_once 'zoneNames.php';
/**
 * dayForecasts class
 */
require_once 'dayForecasts.php';
/**
 * dayForecastV1 class
 */
require_once 'dayForecastV1.php';
/**
 * tags class
 */
require_once 'tags.php';
/**
 * all class
 */
require_once 'all.php';
/**
 * allResponse class
 */
require_once 'allResponse.php';
/**
 * allWeatherResponseV1 class
 */
require_once 'allWeatherResponseV1.php';

/**
 * WeatherV1SoapService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class WeatherV1SoapService extends SoapClient {

  public function WeatherV1SoapService($wsdl = "weatherAPI/weatherService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param taf_for_airport $parameters
   * @return taf_for_airportResponse
   */
  public function taf_for_airport(taf_for_airport $parameters) {
    return $this->__call('taf_for_airport', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.weather.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param zoneForecasts $parameters
   * @return zoneForecastsResponse
   */
  public function zoneForecasts(zoneForecasts $parameters) {
    return $this->__call('zoneForecasts', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.weather.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param metar_for_airport $parameters
   * @return metar_for_airportResponse
   */
  public function metar_for_airport(metar_for_airport $parameters) {
    return $this->__call('metar_for_airport', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.weather.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param all $parameters
   * @return allResponse
   */
  public function all(all $parameters) {
    return $this->__call('all', array(
            new SoapParam($parameters, 'parameters')
      ),
      array(
            'uri' => 'http://v1.service.weather.flightstats.com/',
            'soapaction' => ''
           )
      );
  }

}

?>
