<?php
/**
 * FleetSoapApiService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * fleetStatus_dep class
 */
require_once 'fleetStatus_dep.php';
/**
 * fleetStatus_depResponse class
 */
require_once 'fleetStatus_depResponse.php';
/**
 * responseFleetStatus class
 */
require_once 'responseFleetStatus.php';
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
 * requestFleetStatus class
 */
require_once 'requestFleetStatus.php';
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
 * requestedDate class
 */
require_once 'requestedDate.php';
/**
 * requestedInteger class
 */
require_once 'requestedInteger.php';
/**
 * requestedString class
 */
require_once 'requestedString.php';
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
 * fleetTracks class
 */
require_once 'fleetTracks.php';
/**
 * fleetTracksResponse class
 */
require_once 'fleetTracksResponse.php';
/**
 * responseFleetTrack class
 */
require_once 'responseFleetTrack.php';
/**
 * flightTracksResponse class
 */
require_once 'flightTracksResponse.php';
/**
 * flightTracks class
 */
require_once 'flightTracks.php';
/**
 * requestFleetTrack class
 */
require_once 'requestFleetTrack.php';
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
 * positionV2 class
 */
require_once 'positionV2.php';
/**
 * waypointV2 class
 */
require_once 'waypointV2.php';

/**
 * FleetSoapApiService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class FleetSoapApiService extends SoapClient {

  public function FleetSoapApiService($wsdl = "E:\wamp\www\signsmart2\protected\vendors\flightStatAPI\flightStatusTrackAPI\fleet\fleetService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param fleetStatus_dep $parameters
   * @return fleetStatus_depResponse
   */
  public function fleetStatus_dep(fleetStatus_dep $parameters) {
    return $this->__call('fleetStatus_dep', array(
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
   * @param fleetTracks $parameters
   * @return fleetTracksResponse
   */
  public function fleetTracks(fleetTracks $parameters) {
    return $this->__call('fleetTracks', array(
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
