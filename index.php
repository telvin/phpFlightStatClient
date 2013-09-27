<?php

require_once('functions.php');
require_once('schedulesAPI/ScheduledFlightsV1SoapService.php');

$service = new ScheduledFlightsV1SoapService('https://api.flightstats.com/flex/schedules/soap/v1/scheduledFlightsService?wsdl', array( 'trace' => 1, 'exceptions' => true, 'cache_wsdl' => WSDL_CACHE_NONE));

$params = new byFlight_Departing();
$params->appId = 'e6a4e702';
$params->appKey = 'd3b76b97c575a5a725c5440f8c9f8c41';
$params->carrier = 'AA';
$params->flightnumber = '100';
$params->year = '2013';
$params->month = '9';
$params->day = '16';

$response = objectToObject($service->byFlight_Departing($params)->return, 'responseBase');
var_dump($response->scheduledFlights);
var_dump($response->appendix);
var_dump($response->errors)




?>