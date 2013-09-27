<?php
/* This class serves for API that is defined on https://developer.flightstats.com */

class FlightStatHelper
{

    const FLIGHTSTAT_APP_ID = 'a3b9a1a7';
    const FLIGHTSTAT_APP_KEY = 'c4f4d38a87c9ea49d0679cd3df447bea';

    const FLIGHTSTAT_AIRPORT_WSDL_URL = 'https://api.flightstats.com/flex/airports/soap/v1/airportsService?wsdl';
    const FLIGHTSTAT_ALERT_WSDL_URL = 'https://api.flightstats.com/flex/alerts/soap/v1/flightAlertsService?wsdl';
    const FLIGHTSTAT_CONN_WSDL_URL = 'https://api.flightstats.com/flex/connections/soap/v1/schedulesConnectionsService?wsdl';
    const FLIGHTSTAT_DELAY_WSDL_URL = 'https://api.flightstats.com/flex/delayindex/soap/v1/delayIndexService?wsdl';

    const FLIGHTSTAT_STATUS_TRACK_BY_AIRPORT_WSDL_URL = 'https://api.flightstats.com/flex/flightstatus/soap/v2/airportService?wsdl';
    const FLIGHTSTAT_STATUS_TRACK_BY_FLIGHT_WSDL_URL = 'https://api.flightstats.com/flex/flightstatus/soap/v2/flightService?wsdl';
    const FLIGHTSTAT_STATUS_TRACK_BY_ROUTE_WSDL_URL = 'https://api.flightstats.com/flex/flightstatus/soap/v2/routeService?wsdl';
    const FLIGHTSTAT_STATUS_TRACK_FLIGHTNEAR_WSDL_URL = 'https://api.flightstats.com/flex/flightstatus/soap/v2/flightsNearService?wsdl';
    const FLIGHTSTAT_STATUS_TRACK_FLEET_WSDL_URL = 'https://api.flightstats.com/flex/flightstatus/soap/v2/fleetService?wsdl';


    const FLIGHTSTAT_RATING_WSDL_URL = 'https://api.flightstats.com/flex/ratings/soap/v1/ratingsService?wsdl';
    const FLIGHTSTAT_WEATHER_WSDL_URL = 'https://api.flightstats.com/flex/weather/soap/v1/weatherService?wsdl';
    const FLIGHTSTAT_SCHEDULE_WSDL_URL = 'https://api.flightstats.com/flex/schedules/soap/v1/scheduledFlightsService?wsdl';

    public static function register()
    {

        Yii::import('application.vendors.flightStatAPI.airportsAPI.AirportsV1SoapService');
        Yii::import('application.vendors.flightStatAPI.alertsAPI.FlightAlertsV1SoapService');
        Yii::import('application.vendors.flightStatAPI.connectionsAPI.ScheduleConnectionsV1SoapService');

        Yii::import('application.vendors.flightStatAPI.flightStatusTrackAPI.airport.AirportSoapApiService');
        Yii::import('application.vendors.flightStatAPI.flightStatusTrackAPI.byFlight.FlightSoapApiService');
        Yii::import('application.vendors.flightStatAPI.flightStatusTrackAPI.byRoute.RouteSoapApiService');
        Yii::import('application.vendors.flightStatAPI.flightStatusTrackAPI.flightNears.FlightsNearSoapApiService');
        Yii::import('application.vendors.flightStatAPI.flightStatusTrackAPI.fleet.FleetSoapApiService');

        Yii::import('application.vendors.flightStatAPI.delayIndexAPI.DelayIndexV1SoapService');
        Yii::import('application.vendors.flightStatAPI.ratingsAPI.RatingsV1SoapService');
        Yii::import('application.vendors.flightStatAPI.schedulesAPI.ScheduledFlightsV1SoapService');
        Yii::import('application.vendors.flightStatAPI.weatherAPI.WeatherV1SoapService');

        Yii::import('application.vendors.RestCurl.RESTClient');

    }

    /**
     * @param $obj
     * @param $optionParams
     * - codeType: Type of any given codes: 'IATA', 'ICAO', or 'FS'. If not specified, all domains will be searched in the order stated
     * - extendedOptions: Extended options for modifying standard API behavior to fit special use cases. Options: 'useInlinedReferences', 'useHttpErrors', 'languageCode:XX',
     *   see more on https://developer.flightstats.com/api-docs/extended_options
     *
     * @return mixed
     */
    public static function prepareRequest($obj, $optionParams)
    {
        $obj->appId = self::FLIGHTSTAT_APP_ID;
        $obj->appKey = self::FLIGHTSTAT_APP_KEY;

        foreach ($optionParams as $key => $value) {
            $obj->{$key} = $value;
        }
        return $obj;
    }


    public static function handleResponse($service, $action, $params, $parseArr = array(), $throwExc = true, $respReturn = 'return')
    {
        //var_dump($service->{$action}($params)->return);exit;

        //some request API do not have response base class
        $rp = empty($respReturn) ? $service->{$action}($params) : $service->{$action}($params)->$respReturn;
        if (empty($parseArr['respClass'])) {
            return $rp;
        }

        $response = Commons::objectToObject($rp, $parseArr['respClass']);

        if ($response->error && $throwExc) {
            throw new CHttpException(sprintf("%s %s %s", __FILE__, __LINE__, __FUNCTION__), "Could not resolve the error: " . $response->error->errorMessage);
        }

        if ($parseArr['PropertyLevel1']) {
            $o1 = $response->{$parseArr['PropertyLevel1']};
            if ($o1) {
                if ($parseArr['PropertyLevel2']) {
                    $o2 = $o1->{$parseArr['PropertyLevel2']};

                    if ($o2)
                        return $o2;
                }
            }
            return $o1;
        }
        return $response;
    }

    /*** GET ALERT: ***/

    public static function createFlightRuleBy_Arrival($carrier, $flightNumber, $arrivalAirport, $year, $month, $day, $type, $deliverTo, $optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byArrivingFlight();
        $params->carrier = $carrier;
        $params->flightNumber = $flightNumber;
        $params->arrivalAirport = $arrivalAirport;

        $params->type = $type;
        $params->deliverTo = $deliverTo;

        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);
        $rp = self::handleResponse($service, 'byArrivingFlight', $params, array(
            'respClass' => 'responseRule'
        ));
        return $rp;
    }

    public static function createFlightRuleBy_Departure($carrier, $flightNumber, $departureAirport, $year, $month, $day, $type, $deliverTo, $optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byDepartingFlight();
        $params->carrier = $carrier;
        $params->flightNumber = $flightNumber;
        $params->departureAirport = $departureAirport;

        $params->type = $type;
        $params->deliverTo = $deliverTo;

        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);
        $rp = self::handleResponse($service, 'byDepartingFlight', $params, array(
            'respClass' => 'responseRule'
        ));
        return $rp;
    }

    public static function createFlightRuleForRouteBy_ArrivalDate($carrier, $flightNumber, $departureAirport, $arrivalAirport, $year, $month, $day, $type, $deliverTo, $optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byRouteArrival();
        $params->carrier = $carrier;
        $params->flightNumber = $flightNumber;
        $params->departureAirport = $departureAirport;
        $params->arrivalAirport = $arrivalAirport;

        $params->type = $type;
        $params->deliverTo = $deliverTo;

        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);
        $rp = self::handleResponse($service, 'byRouteArrival', $params, array(
            'respClass' => 'responseRule'
        ));
        return $rp;
    }


    public static function createFlightRuleForRouteBy_DepartureDate($carrier, $flightNumber, $departureAirport, $arrivalAirport, $year, $month, $day, $type, $deliverTo, $optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byRouteDeparture();
        $params->carrier = $carrier;
        $params->flightNumber = $flightNumber;
        $params->departureAirport = $departureAirport;
        $params->arrivalAirport = $arrivalAirport;

        $params->type = $type;
        $params->deliverTo = $deliverTo;

        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);
        $rp = self::handleResponse($service, 'byRouteDeparture', $params, array(
            'respClass' => 'responseRule'
        ));
        return $rp;
    }

    public static function deletePreviousRuleBy_Id($ruleId, $optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new deleteById();
        $params->ruleId = $ruleId;

        $params = self::prepareRequest($params, $optionParams);
        $rp = self::handleResponse($service, 'deleteById', $params, array(
            'respClass' => 'responseRule'
        ));

        return $rp;
    }

    public static function getPreviousRuleBy_Id($ruleId, $optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new getById();
        $params->ruleId = $ruleId;

        $params = self::prepareRequest($params, $optionParams);
        $rp = self::handleResponse($service, 'getById', $params, array(
            'respClass' => 'responseRule'
        ));

        return $rp;
    }

    public static function getAllAlertRuleIds($optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new listRuleIDs();

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();
        $rp = self::handleResponse($service, 'listRuleIDs', $params, array(
            'respClass' => 'responseRule',
            'PropertyLevel1' => 'ruleIds',
            'PropertyLevel2' => 'ruleId',
        ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getAllAlertRuleIdsLessThan_Id($maxRuleId, $optionParams = array())
    {
        self::register();
        $service = new FlightAlertsV1SoapService(self::FLIGHTSTAT_ALERT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new listRuleIDsLessThan();
        $params->lessThan = $maxRuleId;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();
        $rp = self::handleResponse($service, 'listRuleIDsLessThan', $params, array(
            'respClass' => 'responseRule',
            'PropertyLevel1' => 'ruleIds',
            'PropertyLevel2' => 'ruleId',
        ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    /*** GET ALERT. ***/

    /*** GET AIRPORT: ***/

    public static function getAllAirports($optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new allAirports();

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'allAirports', $params);

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;

    }

    public static function getAllActiveAirPorts($optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new currentAirports();

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'currentAirports', $params);

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getAirPortBy_Code($code, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new anyCode_currentAirport();
        $params->code = $code;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'anyCode_currentAirport', $params);
        return $rp;
    }

    public static function getAirPortBy_Code_Date($code, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new anyCode_airportForDay();
        $params->code = $code;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'anyCode_airportForDay', $params);
        return $rp;
    }

    public static function getAllAirPortsBy_CityCode($code, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new cityCode_airports();
        $params->cityCode = $code;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'cityCode_airports', $params);

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getAllAirPortsBy_CountryCode($code, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new countryCode_airports();
        $params->countryCode = $code;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'countryCode_airports', $params);

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getAirPortBy_FsCode($code, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportByFsCode();
        $params->code = $code;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'airportByFsCode', $params);
        return $rp;
    }

    public static function getAirPortBy_IATACode($code, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportsByIata();
        $params->iataCode = $code;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'airportsByIata', $params);

        return $rp;
    }

    public static function getAirPortBy_IATACode_Date($code, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportByIata();
        $params->iataCode = $code;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'airportByIata', $params);
        return $rp;
    }

    public static function getAirPortBy_ICAOCode($code, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportsByIcao();
        $params->icaoCode = $code;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'airportsByIcao', $params);

        return $rp;
    }

    public static function getAirPortBy_ICAOCode_Date($code, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportByIcao();
        $params->icaoCode = $code;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'airportByIcao', $params);
        return $rp;
    }

    public static function getAllAirPortsBy_WithinRadiusOfLocation($longitude, $latitude, $radiusMiles, $optionParams = array())
    {
        self::register();
        $service = new AirportsV1SoapService(self::FLIGHTSTAT_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new radius_airports();
        $params->longitude = $longitude;
        $params->latitude = $latitude;
        $params->radiusMiles = $radiusMiles;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'radius_airports', $params);

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    /*** GET AIRPORT. ***/

    /*** GET CONNECTION: ***/

    /**
     * @param $arrivalCode
     * @param $year
     * @param $month
     * @param $day
     * @param array $optionParams
     * - carriers: A list of carrier codes to return schedules and connection for (e.g. 'AA' or 'US,BA' ). Default behavior is to return schedules for all carriers.
     * - codeshareType: A filter to limit flights by their codeshare attribute. [OPERATED_MARKETED: (default) return all operating and marketing flights. OPERATED_ONLY: return only operating flights]
    - serviceType: A filter to limit the flights returned by passenger or cargo flights. The default behavior returns both passenger and cargo flights. [PASSENGER_ONLY: return Passenger Flights. CARGO_ONLY: return Cargo Flights]
    - flightType: A filter to limit the flights returned to non-stop or direct. The default behavior returns all direct flights. [NON_STOP: return only non-stop flights. DIRECT: return non-stop and direct flights]
     * @return mixed
     */
    public static function getDirectScheduleBy_ArrivalLocation_Date($arrivalCode, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new directFlightsArrivingOnDate();
        $params->arrivalCode = $arrivalCode;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'directFlightsArrivingOnDate', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;

    }

    public static function getDirectScheduleBy_DepartureLocation_Date($departureCode, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new directFlightsDepartingOnDate();
        $params->departureCode = $departureCode;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'directFlightsDepartingOnDate', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;

    }

    public static function getDirectScheduleBy_Carrier_FlightNumber_Arriving_Date($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new directFlightsArriving();
        $params->carrier = $carrier;
        $params->flightNumber = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'directFlightsArriving', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        return $rp;

    }

    public static function getDirectScheduleBy_Carrier_FlightNumber_Departing_Date($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new directFlightsArriving();
        $params->carrier = $carrier;
        $params->flightNumber = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'directFlightsDeparting', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        return $rp;

    }

    public static function getDirectScheduleBy_Carrier_FlightNumber_Locations_Arriving_Date($carrier, $arrivalCode, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new directFlightsArrivingAirport();
        $params->carrier = $carrier;
        $params->arrivalCode = $arrivalCode;
        $params->flightNumber = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'directFlightsArrivingAirport', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        return $rp;

    }

    public static function getDirectScheduleBy_Carrier_FlightNumber_Locations_Departing_Date($carrier, $departureCode, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new directFlightsDepartingAirport();
        $params->carrier = $carrier;
        $params->departureCode = $departureCode;
        $params->flightNumber = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'directFlightsDepartingAirport', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        return $rp;

    }


    public static function getDirectAndConnectingScheduleBy_Locations_Arriving_Date($departureCode, $arrivalCode, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new connectingFlightsForRouteByArrival();
        $params->departureCode = $departureCode;
        $params->arrivalCode = $arrivalCode;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'connectingFlightsForRouteByArrival', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;

    }

    public static function getDirectAndConnectingScheduleBy_Locations_Departure_Date($departureCode, $arrivalCode, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduleConnectionsV1SoapService(self::FLIGHTSTAT_CONN_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new connectingFlightsForRouteByDeparture();
        $params->departureCode = $departureCode;
        $params->arrivalCode = $arrivalCode;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'connectingFlightsForRouteByDeparture', $params,
            array(
                'respClass' => 'flightResponseV1',
                'PropertyLevel1' => 'flights',
                'PropertyLevel2' => 'flight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;

    }

    /*** GET CONNECTION. ***/

    /*** GET DELAY INDEX: ***/

    public static function getDelayIndexesBy_Airport($airportCode, $optionParams = array())
    {
        self::register();
        $service = new DelayIndexV1SoapService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new forAirport();
        $params->airportCodes = $airportCode;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'forAirport', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'delayIndexes',
                'PropertyLevel2' => 'delayIndex',
            ));

        return $rp;
    }

    public static function getDelayIndexesBy_CountryCode($countryCode, $optionParams = array())
    {
        self::register();
        $service = new DelayIndexV1SoapService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new forCountry();
        $params->countryCode = $countryCode;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'forCountry', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'delayIndexes',
                'PropertyLevel2' => 'delayIndex',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getDelayIndexesBy_Region($region, $optionParams = array())
    {
        self::register();
        $service = new DelayIndexV1SoapService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new forRegion();
        $params->region = $region;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'forRegion', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'delayIndexes',
                'PropertyLevel2' => 'delayIndex',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }


    /**
     * this function is just available for US and Canada only
     */
    public static function getDelayIndexesBy_StateCode($stateCode, $optionParams = array())
    {
        self::register();
        $service = new DelayIndexV1SoapService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new forState();
        $params->stateCode = $stateCode;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'forState', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'delayIndexes',
                'PropertyLevel2' => 'delayIndex',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    /*** GET DELAY INDEX. ***/


    /*** GET FLIGHT STATUS & TRACK BY AIRPORT: ***/

    public static function getAirportStatus_Departures($airport, $hourOfDay, $year, $month, $day, $utc, $optionParams = array())
    {
        self::register();
        $service = new AirportSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_BY_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportStatus_dep();
        $params->airport = $airport;
        $params->hourOfDay = $hourOfDay;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;
        $params->utc = $utc;


        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'airportStatus_dep', $params,
            array(
                'respClass' => 'responseImpl',
                'PropertyLevel1' => 'flightStatuses',
                'PropertyLevel2' => 'flightStatus',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getAirportStatus_Arrivals($airport, $hourOfDay, $year, $month, $day, $utc, $optionParams = array())
    {
        self::register();
        $service = new AirportSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_BY_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportStatus_arr();
        $params->airport = $airport;
        $params->hourOfDay = $hourOfDay;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;
        $params->utc = $utc;


        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'airportStatus_arr', $params,
            array(
                'respClass' => 'responseImpl',
                'PropertyLevel1' => 'flightStatuses',
                'PropertyLevel2' => 'flightStatus',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getAirportTrack_Departure($airport, $optionParams = array())
    {
        self::register();
        $service = new AirportSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_BY_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportTracks_dep();
        $params->airport = $airport;


        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'airportTracks_dep', $params,
            array(
                'respClass' => 'flightTracksResponse',
                'PropertyLevel1' => 'flightTracks',
                'PropertyLevel2' => 'flightTrack',
            ));

        return $rp;
    }

    public static function getAirportTrack_Arrivals($airport, $optionParams = array())
    {
        self::register();
        $service = new AirportSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_BY_AIRPORT_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new airportTracks_arr();
        $params->airport = $airport;


        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'airportTracks_arr', $params,
            array(
                'respClass' => 'flightTracksResponse',
                'PropertyLevel1' => 'flightTracks',
                'PropertyLevel2' => 'flightTrack',
            ));

        return $rp;
    }

    /*** GET FLIGHT STATUS & TRACK BY AIRPORT. ***/


    /*** GET FLIGHT STATUS & TRACK BY FLIGHT: ***/
    /*wait for testing*/
    public static function getFlightStatusBy_FlightId($flightId, $optionParams = array())
    {
        self::register();
        $service = new FlightSoapApiService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightStatus_fhid();
        $params->flightId = $flightId;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightStatus_fhid', $params,
            array(
//                'respClass' => '',
//                'PropertyLevel1' => '',
//                'PropertyLevel2' => '',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFlightStatusesBy_DepartedDate($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new FlightSoapApiService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightStatus_dep();
        $params->carrier = $carrier;
        $params->flight = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightStatus_dep', $params,
            array(
//                'respClass' => '',
//                'PropertyLevel1' => '',
//                'PropertyLevel2' => '',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFlightStatusesBy_ArrivalDate($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new FlightSoapApiService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightStatus_arr();
        $params->carrier = $carrier;
        $params->flight = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightStatus_arr', $params,
            array(
//                'respClass' => '',
//                'PropertyLevel1' => '',
//                'PropertyLevel2' => '',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFlightTrackBy_FlightId($flightId, $optionParams = array())
    {
        self::register();
        $service = new FlightSoapApiService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightTrack_fhid();
        $params->flightId = $flightId;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightTrack_fhid', $params,
            array(
//                'respClass' => '',
//                'PropertyLevel1' => '',
//                'PropertyLevel2' => '',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFlightTrackBy_DepartedDate($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new FlightSoapApiService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightTrack_dep();
        $params->carrier = $carrier;
        $params->flight = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightTrack_dep', $params,
            array(
//                'respClass' => '',
//                'PropertyLevel1' => '',
//                'PropertyLevel2' => '',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFlightTrackBy_ArrivalDate($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new FlightSoapApiService(self::FLIGHTSTAT_DELAY_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightTrack_arr();
        $params->carrier = $carrier;
        $params->flight = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightTrack_arr', $params,
            array(
//                'respClass' => '',
//                'PropertyLevel1' => '',
//                'PropertyLevel2' => '',
            ));

        return $rp;
    }

    /*** GET FLIGHT STATUS & TRACK BY FLIGHT. ***/

    /*** GET FLIGHT STATUS & TRACK BY BY ROUTE: ***/

    /*wait for testing*/
    public static function getRouteStatusBy_ArrivalDate($departureAirport, $arrivalAirport, $year, $month, $day, $optionParams = array()){
        self::register();
        $service = new RouteSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_BY_ROUTE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new routeStatus_arriving();
        $params->departureAirport = $departureAirport;
        $params->arrivalAirport = $arrivalAirport;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'routeStatus_arriving', $params,
            array(
//                'respClass' => 'responseBase',
//                'PropertyLevel1' => 'scheduledFlights',
//                'PropertyLevel2' => 'scheduledFlight',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getRouteStatusBy_DepartureDate($departureAirport, $arrivalAirport, $year, $month, $day, $optionParams = array()){
        self::register();
        $service = new RouteSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_BY_ROUTE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new routeStatus_departing();
        $params->departureAirport = $departureAirport;
        $params->arrivalAirport = $arrivalAirport;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'routeStatus_departing', $params,
            array(
//                'respClass' => 'responseBase',
//                'PropertyLevel1' => 'scheduledFlights',
//                'PropertyLevel2' => 'scheduledFlight',
            ));

        return $rp;
    }

    /*** GET FLIGHT STATUS & TRACK BY ROUTE. ***/

    /*** GET FLIGHT STATUS & TRACK BY FLEET: ***/

    /*wait for testing*/
    public static function getFleetStatusBy_Departure($carrier, $hourOfDay, $year, $month, $day, $utc, $optionParams = array()){
        self::register();
        $service = new FleetSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_FLEET_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new fleetStatus_dep();
        $params->carrier = $carrier;
        $params->hourOfDay = $hourOfDay;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;
        $params->utc = $utc;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'fleetStatus_dep', $params,
            array(
//                'respClass' => 'responseBase',
//                'PropertyLevel1' => 'scheduledFlights',
//                'PropertyLevel2' => 'scheduledFlight',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFleetTracks($carrier, $optionParams = array()){
        self::register();
        $service = new FleetSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_FLEET_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new fleetTracks();
        $params->carrier = $carrier;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'fleetTracks', $params,
            array(
//                'respClass' => 'responseBase',
//                'PropertyLevel1' => 'scheduledFlights',
//                'PropertyLevel2' => 'scheduledFlight',
            ));

        return $rp;
    }
    /*** GET FLIGHT STATUS & TRACK BY FLEET. ***/

    /*** GET FLIGHT STATUS & TRACK BY FLIGHTS NEAR: ***/
    /*wait for testing*/
    public static function getAllFlightsWithBoundingBox($topLat, $leftOn, $bottomLat, $rightLon, $optionParams = array()){
        self::register();
        $service = new FlightsNearSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_FLIGHTNEAR_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightsNear_box();
        $params->topLat = $topLat;
        $params->leftOn = $leftOn;
        $params->bottomLat = $bottomLat;
        $params->rightLon = $rightLon;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightsNear_box', $params,
            array(
//                'respClass' => 'responseBase',
//                'PropertyLevel1' => 'scheduledFlights',
//                'PropertyLevel2' => 'scheduledFlight',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getAllFlightsWithinAreaBy_Point_Radius($lat, $lon, $miles, $optionParams = array()){
        self::register();
        $service = new FlightsNearSoapApiService(self::FLIGHTSTAT_STATUS_TRACK_FLIGHTNEAR_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new flightsNear_radius();
        $params->lat = $lat;
        $params->lon = $lon;
        $params->miles = $miles;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'flightsNear_radius', $params,
            array(
//                'respClass' => 'responseBase',
//                'PropertyLevel1' => 'scheduledFlights',
//                'PropertyLevel2' => 'scheduledFlight',
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFIDSDataForFlight_Departing_Airport($airport, $requestedFields){
        $rest = new RESTClient();
        $rest->initialize(array(
            'server' => 'https://api.flightstats.com/flex/fids/rest/v1/',
        ));

        $rp = $rest->get("json/{$airport}/departures",
            array(
                'api_id'=> self::FLIGHTSTAT_APP_ID,
                'api_key'=> self::FLIGHTSTAT_APP_KEY,
                'requestedFields'=> $requestedFields
            ));

        return $rp;
    }

    /*wait for testing*/
    public static function getFIDSDataForFlight_Arriving_Airport($airport, $requestedFields){
        $rest = new RESTClient();
        $rest->initialize(array(
            'server' => 'https://api.flightstats.com/flex/fids/rest/v1/',
        ));

        $rp = $rest->get("json/{$airport}/arrivals",
            array(
                'api_id'=> self::FLIGHTSTAT_APP_ID,
                'api_key'=> self::FLIGHTSTAT_APP_KEY,
                'requestedFields'=> $requestedFields
            ));

        return $rp;
    }

    /*** GET FLIGHT STATUS & TRACK BY FLIGHTS NEAR. ***/

    /*** GET SCHEDULE: ***/
    public static function getScheduleBy_FlightNumber_Departing_Date($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduledFlightsV1SoapService(self::FLIGHTSTAT_SCHEDULE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byFlight_Departing();
        $params->carrier = $carrier;
        $params->flightnumber = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'byFlight_Departing', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'scheduledFlights',
                'PropertyLevel2' => 'scheduledFlight',
            ));
        //var_dump($response->appendix);
        //var_dump($response->errors);

        return $rp;
    }

    public static function getScheduleBy_FlightNumber_Arriving_Date($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduledFlightsV1SoapService(self::FLIGHTSTAT_SCHEDULE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byFlight_Arriving();
        $params->carrier = $carrier;
        $params->flightnumber = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'byFlight_Arriving', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'scheduledFlights',
                'PropertyLevel2' => 'scheduledFlight',
            ));

        return $rp;
    }

    public static function getScheduleBy_Route_Departing_Date($departureAirportCode, $arrivalAirportCode, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduledFlightsV1SoapService(self::FLIGHTSTAT_SCHEDULE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byRoute_Departing();
        $params->departureAirportCode = $departureAirportCode;
        $params->arrivalAirportCode = $arrivalAirportCode;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;


        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'byRoute_Departing', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'scheduledFlights',
                'PropertyLevel2' => 'scheduledFlight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getScheduleBy_Route_Arriving_Date($departureAirportCode, $arrivalAirportCode, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduledFlightsV1SoapService(self::FLIGHTSTAT_SCHEDULE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byRoute_Arriving();
        $params->departureAirportCode = $departureAirportCode;
        $params->arrivalAirportCode = $arrivalAirportCode;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;


        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'byRoute_Arriving', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'scheduledFlights',
                'PropertyLevel2' => 'scheduledFlight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getScheduleBy_Airport_Departing_Date_Hour($departureAirportCode, $hourOfDay, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduledFlightsV1SoapService(self::FLIGHTSTAT_SCHEDULE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byAirport_Departing();
        $params->departureAirportCode = $departureAirportCode;
        $params->hourOfDay = $hourOfDay;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;


        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'byAirport_Departing', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'scheduledFlights',
                'PropertyLevel2' => 'scheduledFlight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    public static function getScheduleBy_Airport_Arriving_Date_Hour($arrivalAirportCode, $hourOfDay, $year, $month, $day, $optionParams = array())
    {
        self::register();
        $service = new ScheduledFlightsV1SoapService(self::FLIGHTSTAT_SCHEDULE_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byAirport_Arriving();
        $params->arrivalAirportCode = $arrivalAirportCode;
        $params->hourOfDay = $hourOfDay;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;


        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'byAirport_Arriving', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'scheduledFlights',
                'PropertyLevel2' => 'scheduledFlight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;
    }

    /*** GET SCHEDULE. ***/

    /*** GET RATING: ***/

    public static function getRatingBy_FlightNumber($carrier, $flightNumber, $year, $month, $day, $optionParams = array())
    {
        //property departureAirport: An optional filter to limit results to a specific departure airport
        self::register();
        $service = new RatingsV1SoapService(self::FLIGHTSTAT_RATING_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byFlight();
        $params->carrier = $carrier;
        $params->flightNumber = $flightNumber;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $rp = self::handleResponse($service, 'byFlight', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'ratings',
                'PropertyLevel2' => 'rating',
            ));
        //var_dump($response->appendix);
        //var_dump($response->errors);

        return $rp;
    }

    public static function getRatingBy_Route($departureAirport, $arrivalAirport, $year, $month, $day, $optionParams = array())
    {
        //property departureAirport: An optional filter to limit results to a specific departure airport
        self::register();
        $service = new RatingsV1SoapService(self::FLIGHTSTAT_RATING_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new byRoute();
        $params->departureAirport = $departureAirport;
        $params->arrivalAirport = $arrivalAirport;
        $params->year = $year;
        $params->month = $month;
        $params->day = $day;

        $params = self::prepareRequest($params, $optionParams);

        $resultArr = array();

        $rp = self::handleResponse($service, 'byRoute', $params,
            array(
                'respClass' => 'responseBase',
                'PropertyLevel1' => 'scheduledFlights',
                'PropertyLevel2' => 'scheduledFlight',
            ));

        if (is_array($rp)) {
            $resultArr = $rp;
        }

        return $resultArr;

        return $rp;
    }

    /*** GET RATING. ***/

    /*** GET WEATHER: ***/

    public static function getAllWeatherProductsBy_AirPort($airportCode, $optionParams = array())
    {
        //property departureAirport: An optional filter to limit results to a specific departure airport
        self::register();
        $service = new WeatherV1SoapService(self::FLIGHTSTAT_WEATHER_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new all();
        $params->airport = $airportCode;
        $params = self::prepareRequest($params, $optionParams);


        $rp = self::handleResponse($service, 'all', $params,
            array(
                'respClass' => 'allWeatherResponseV1'
            ));

        return $rp;
    }

    public static function getWeatherMETARFor_AirPort($airportCode, $optionParams = array())
    {
        //property departureAirport: An optional filter to limit results to a specific departure airport
        self::register();
        $service = new WeatherV1SoapService(self::FLIGHTSTAT_WEATHER_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new metar_for_airport();
        $params->airport = $airportCode;
        $params = self::prepareRequest($params, $optionParams);


        $rp = self::handleResponse($service, 'metar_for_airport', $params,
            array(
                'respClass' => 'metarResponseV1',
                'PropertyLevel1' => 'metar',
            ));

        return $rp;
    }

    public static function getWeatherTAFFor_AirPort($airportCode, $optionParams = array())
    {
        //property departureAirport: An optional filter to limit results to a specific departure airport
        self::register();
        $service = new WeatherV1SoapService(self::FLIGHTSTAT_WEATHER_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new taf_for_airport();
        $params->airport = $airportCode;
        $params = self::prepareRequest($params, $optionParams);


        $rp = self::handleResponse($service, 'taf_for_airport', $params,
            array(
                'respClass' => 'tafResponseV1',
                'PropertyLevel1' => 'taf',
            ));

        return $rp;
    }

    public static function getWeatherZoneForeCastFor_Airport($airportCode, $optionParams = array())
    {
        //property departureAirport: An optional filter to limit results to a specific departure airport
        self::register();
        $service = new WeatherV1SoapService(self::FLIGHTSTAT_WEATHER_WSDL_URL, array('trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

        $params = new zoneForecasts();
        $params->airport = $airportCode;
        $params = self::prepareRequest($params, $optionParams);


        $rp = self::handleResponse($service, 'zoneForecasts', $params,
            array(
                'respClass' => 'zoneForecastResponseV1',
                'PropertyLevel1' => 'zoneForecast',
            ));

        return $rp;
    }

    /*** GET WEATHER. ***/


}