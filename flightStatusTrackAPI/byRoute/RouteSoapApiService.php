<?php
/**
 * RouteSoapApiService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * routeStatus_departing class
 */
require_once 'routeStatus_departing.php';
/**
 * routeStatus_departingResponse class
 */
require_once 'routeStatus_departingResponse.php';
/**
 * responseRouteStatus class
 */
require_once 'responseRouteStatus.php';
/**
 * flightStatusesResponse class
 */
require_once 'flightStatusesResponse.php';
/**
 * flightStatuses class
 */
require_once 'flightStatuses.php';
/**
 * responseImpl class
 */
require_once 'responseImpl.php';
/**
 * requestRouteStatus class
 */
require_once 'requestRouteStatus.php';
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
 * requestedDate class
 */
require_once 'requestedDate.php';
/**
 * requestedBoolean class
 */
require_once 'requestedBoolean.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * flightStatusV2 class
 */
require_once 'flightStatusV2.php';
/**
 * codeshares class
 */
require_once 'codeshares.php';
/**
 * flightStatusUpdates class
 */
require_once 'flightStatusUpdates.php';
/**
 * airlineV1 class
 */
require_once 'airlineV1.php';
/**
 * dateInfoV2 class
 */
require_once 'dateInfoV2.php';
/**
 * scheduleDataV2 class
 */
require_once 'scheduleDataV2.php';
/**
 * uplines class
 */
require_once 'uplines.php';
/**
 * downlines class
 */
require_once 'downlines.php';
/**
 * uplineFlightV2 class
 */
require_once 'uplineFlightV2.php';
/**
 * downlineFlightV2 class
 */
require_once 'downlineFlightV2.php';
/**
 * operationalTimesV2 class
 */
require_once 'operationalTimesV2.php';
/**
 * codeshareV2 class
 */
require_once 'codeshareV2.php';
/**
 * delaysV2 class
 */
require_once 'delaysV2.php';
/**
 * flightDurationsV2 class
 */
require_once 'flightDurationsV2.php';
/**
 * airportResourcesV2 class
 */
require_once 'airportResourcesV2.php';
/**
 * flightEquipmentV2 class
 */
require_once 'flightEquipmentV2.php';
/**
 * equipmentV1 class
 */
require_once 'equipmentV1.php';
/**
 * flightStatusUpdateV2 class
 */
require_once 'flightStatusUpdateV2.php';
/**
 * updatedTextFields class
 */
require_once 'updatedTextFields.php';
/**
 * updatedDateFields class
 */
require_once 'updatedDateFields.php';
/**
 * flightStatusUpdatedTextV2 class
 */
require_once 'flightStatusUpdatedTextV2.php';
/**
 * flightStatusUpdatedDateV2 class
 */
require_once 'flightStatusUpdatedDateV2.php';
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
 * APIException class
 */
require_once 'APIException.php';
/**
 * routeStatus_arriving class
 */
require_once 'routeStatus_arriving.php';
/**
 * routeStatus_arrivingResponse class
 */
require_once 'routeStatus_arrivingResponse.php';

/**
 * RouteSoapApiService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class RouteSoapApiService extends SoapClient {

  public function RouteSoapApiService($wsdl = "E:\wamp\www\signsmart2\protected\vendors\flightStatAPI\flightStatusTrackAPI\byRoute\routeService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param routeStatus_departing $parameters
   * @return routeStatus_departingResponse
   */
  public function routeStatus_departing(routeStatus_departing $parameters) {
    return $this->__call('routeStatus_departing', array(
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
   * @param routeStatus_arriving $parameters
   * @return routeStatus_arrivingResponse
   */
  public function routeStatus_arriving(routeStatus_arriving $parameters) {
    return $this->__call('routeStatus_arriving', array(
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
