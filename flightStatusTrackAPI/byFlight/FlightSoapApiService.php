<?php
/**
 * FlightSoapApiService class file
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */

/**
 * flightTrack_fhid class
 */
require_once 'flightTrack_fhid.php';
/**
 * flightTrack_fhidResponse class
 */
require_once 'flightTrack_fhidResponse.php';
/**
 * responseFlightTrackById class
 */
require_once 'responseFlightTrackById.php';
/**
 * flightTrackResponse class
 */
require_once 'flightTrackResponse.php';
/**
 * responseImpl class
 */
require_once 'responseImpl.php';
/**
 * requestFlightTrackById class
 */
require_once 'requestFlightTrackById.php';
/**
 * requestBase class
 */
require_once 'requestBase.php';
/**
 * requestedLong class
 */
require_once 'requestedLong.php';
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
 * airportV1 class
 */
require_once 'airportV1.php';
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
 * flightTrack_dep class
 */
require_once 'flightTrack_dep.php';
/**
 * flightTrack_depResponse class
 */
require_once 'flightTrack_depResponse.php';
/**
 * responseFlightTrack class
 */
require_once 'responseFlightTrack.php';
/**
 * flightTracksResponse class
 */
require_once 'flightTracksResponse.php';
/**
 * flightTracks class
 */
require_once 'flightTracks.php';
/**
 * requestFlightTrack class
 */
require_once 'requestFlightTrack.php';
/**
 * requestedAirlineV1 class
 */
require_once 'requestedAirlineV1.php';
/**
 * requestedFlightNumber class
 */
require_once 'requestedFlightNumber.php';
/**
 * requestedDate class
 */
require_once 'requestedDate.php';
/**
 * requestedAirportV1 class
 */
require_once 'requestedAirportV1.php';
/**
 * flightStatus_dep class
 */
require_once 'flightStatus_dep.php';
/**
 * flightStatus_depResponse class
 */
require_once 'flightStatus_depResponse.php';
/**
 * responseFlightStatus class
 */
require_once 'responseFlightStatus.php';
/**
 * flightStatusesResponse class
 */
require_once 'flightStatusesResponse.php';
/**
 * flightStatuses class
 */
require_once 'flightStatuses.php';
/**
 * requestFlightStatus class
 */
require_once 'requestFlightStatus.php';
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
 * flightStatus_fhid class
 */
require_once 'flightStatus_fhid.php';
/**
 * flightStatus_fhidResponse class
 */
require_once 'flightStatus_fhidResponse.php';
/**
 * responseFlightStatusById class
 */
require_once 'responseFlightStatusById.php';
/**
 * flightStatusResponse class
 */
require_once 'flightStatusResponse.php';
/**
 * requestFlightStatusById class
 */
require_once 'requestFlightStatusById.php';
/**
 * flightStatus_arr class
 */
require_once 'flightStatus_arr.php';
/**
 * flightStatus_arrResponse class
 */
require_once 'flightStatus_arrResponse.php';
/**
 * flightTrack_arr class
 */
require_once 'flightTrack_arr.php';
/**
 * flightTrack_arrResponse class
 */
require_once 'flightTrack_arrResponse.php';

/**
 * FlightSoapApiService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class FlightSoapApiService extends SoapClient {

  public function FlightSoapApiService($wsdl = "E:\wamp\www\signsmart2\protected\vendors\flightStatAPI\flightStatusTrackAPI\byFlight\flightService.wsdl", $options = array()) {
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param flightStatus_arr $parameters
   * @return flightStatus_arrResponse
   */
  public function flightStatus_arr(flightStatus_arr $parameters) {
    return $this->__call('flightStatus_arr', array(
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
   * @param flightTrack_fhid $parameters
   * @return flightTrack_fhidResponse
   */
  public function flightTrack_fhid(flightTrack_fhid $parameters) {
    return $this->__call('flightTrack_fhid', array(
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
   * @param flightTrack_arr $parameters
   * @return flightTrack_arrResponse
   */
  public function flightTrack_arr(flightTrack_arr $parameters) {
    return $this->__call('flightTrack_arr', array(
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
   * @param flightTrack_dep $parameters
   * @return flightTrack_depResponse
   */
  public function flightTrack_dep(flightTrack_dep $parameters) {
    return $this->__call('flightTrack_dep', array(
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
   * @param flightStatus_fhid $parameters
   * @return flightStatus_fhidResponse
   */
  public function flightStatus_fhid(flightStatus_fhid $parameters) {
    return $this->__call('flightStatus_fhid', array(
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
   * @param flightStatus_dep $parameters
   * @return flightStatus_depResponse
   */
  public function flightStatus_dep(flightStatus_dep $parameters) {
    return $this->__call('flightStatus_dep', array(
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
