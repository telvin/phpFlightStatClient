<?php
/**
 * AirportSoapApiService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * airportTracks_arr class
 */
require_once 'airportTracks_arr.php';
/**
 * airportTracks_arrResponse class
 */
require_once 'airportTracks_arrResponse.php';
/**
 * responseAirportTracks class
 */
require_once 'responseAirportTracks.php';
/**
 * flightTracksResponse class
 */
require_once 'flightTracksResponse.php';
/**
 * flightTracks class
 */
require_once 'flightTracks.php';
/**
 * responseImpl class
 */
require_once 'responseImpl.php';
/**
 * requestAirportTracks class
 */
require_once 'requestAirportTracks.php';
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
 * requestedBoolean class
 */
require_once 'requestedBoolean.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
/**
 * flightTrackV2 class
 */
require_once 'flightTrackV2.php';
/**
 * positions class
 */
require_once 'positions.php';
/**
 * waypoints class
 */
require_once 'waypoints.php';
/**
 * airlineV1 class
 */
require_once 'airlineV1.php';
/**
 * dateInfoV2 class
 */
require_once 'dateInfoV2.php';
/**
 * positionV2 class
 */
require_once 'positionV2.php';
/**
 * waypointV2 class
 */
require_once 'waypointV2.php';
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
 * equipmentV1 class
 */
require_once 'equipmentV1.php';
/**
 * APIException class
 */
require_once 'APIException.php';
/**
 * airportStatus_arr class
 */
require_once 'airportStatus_arr.php';
/**
 * airportStatus_arrResponse class
 */
require_once 'airportStatus_arrResponse.php';
/**
 * responseAirportStatus class
 */
require_once 'responseAirportStatus.php';
/**
 * flightStatusesResponse class
 */
require_once 'flightStatusesResponse.php';
/**
 * flightStatuses class
 */
require_once 'flightStatuses.php';
/**
 * requestAirportStatus class
 */
require_once 'requestAirportStatus.php';
/**
 * requestedDate class
 */
require_once 'requestedDate.php';
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
 * airportTracks_dep class
 */
require_once 'airportTracks_dep.php';
/**
 * airportTracks_depResponse class
 */
require_once 'airportTracks_depResponse.php';
/**
 * airportStatus_dep class
 */
require_once 'airportStatus_dep.php';
/**
 * airportStatus_depResponse class
 */
require_once 'airportStatus_depResponse.php';

/**
 * AirportSoapApiService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class AirportSoapApiService extends SoapClient {

  public function AirportSoapApiService($wsdl = "E:\wamp\www\signsmart2\protected\vendors\flightStatAPI\flightStatusTrackAPI\airport\airportService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param airportTracks_arr $parameters
   * @return airportTracks_arrResponse
   */
  public function airportTracks_arr(airportTracks_arr $parameters) {
    return $this->__call('airportTracks_arr', array(
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
   * @param airportTracks_dep $parameters
   * @return airportTracks_depResponse
   */
  public function airportTracks_dep(airportTracks_dep $parameters) {
    return $this->__call('airportTracks_dep', array(
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
   * @param airportStatus_arr $parameters
   * @return airportStatus_arrResponse
   */
  public function airportStatus_arr(airportStatus_arr $parameters) {
    return $this->__call('airportStatus_arr', array(
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
   * @param airportStatus_dep $parameters
   * @return airportStatus_depResponse
   */
  public function airportStatus_dep(airportStatus_dep $parameters) {
    return $this->__call('airportStatus_dep', array(
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
