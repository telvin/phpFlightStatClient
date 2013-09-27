phpFlightStatClient
===================
Welcome to the phpFlightStatClient wiki!

Almost library component has been generated by wsdl2php from Knut Urdalen <knut.urdalen@telio.no>, I specially thank to him.

This library is used to interact with the FlighStats API which can be found here

[https://developer.flightstats.com/products](https://developer.flightstats.com/products)

HOW TO USE on Yii
Download and put this library source folder into protected/vendors/

Import FlightStatHelper.php into your project

`Yii::import('application.vendors.flightStatAPI.FlightStatHelper', true);`

Usage:

        $result = FlightStatHelper::getScheduleBy_FlightNumber_Departing_Date('AA', '100', '2013', '9' , '24');
        $result = FlightStatHelper::getScheduleBy_FlightNumber_Arriving_Date('AA', '100', '2013', '9' , '24');
        $result = FlightStatHelper::getScheduleBy_Route_Departing_Date('ABQ', 'DFW', '2013', '9' , '24');
        $result = FlightStatHelper::getScheduleBy_Route_Arriving_Date('ABQ', 'DFW', '2013', '9' , '24');
        $result = FlightStatHelper::getScheduleBy_Airport_Departing_Date_Hour('ABQ', '13', '2013', '9' , '24');
        $result = FlightStatHelper::getRatingBy_FlightNumber('HA', 25, '2013', '9' , '24');
        $result = FlightStatHelper::getRatingBy_Route('PDX', 'HNL', '2013', '9' , '24');
        $result = FlightStatHelper::getDirectScheduleBy_ArrivalLocation_Date('LHR', '2013', '9' , '24');
        $result = FlightStatHelper::getDirectScheduleBy_DepartureLocation_Date('JFK', '2013', '9' , '24');
        $result = FlightStatHelper::getDirectScheduleBy_Carrier_FlightNumber_Arriving_Date('AA', '100', '2013', '9' , '24');
        $result = FlightStatHelper::getDirectAndConnectingScheduleBy_Locations_Arriving_Date('JFK', 'LHR', '2013', '9' , '24');
        $result = FlightStatHelper::getDirectAndConnectingScheduleBy_Locations_Departure_Date('JFK', 'LHR', '2013', '9' , '24');
        $result = FlightStatHelper::getDirectScheduleBy_Carrier_FlightNumber_Locations_Departing_Date('AA','JFK', '100', '2013', '9' , '24');
        $result = FlightStatHelper::getDirectScheduleBy_Carrier_FlightNumber_Locations_Arriving_Date('AA','LHR', '100', '2013', '9' , '24');
        $result = FlightStatHelper::getDelayIndexesBy_Airport('JFK');
        $result = FlightStatHelper::getDelayIndexesBy_CountryCode('US');
        $result = FlightStatHelper::getDelayIndexesBy_Region('Asia');
        $result = FlightStatHelper::getDelayIndexesBy_StateCode('TX');
        $result = FlightStatHelper::getAllAirports();
        $result = FlightStatHelper::getAirPortBy_Code('PDX');
        $result = FlightStatHelper::getAirPortBy_Code_Date('PDX', 2013, 9, 24);
        $result = FlightStatHelper::getAirPortBy_CityCode('PDX');
        $result = FlightStatHelper::getAirPortBy_CountryCode('US');
        $result = FlightStatHelper::getAirPortBy_FsCode('PDX');
        $result = FlightStatHelper::getAirPortBy_IATACode('PDX');
        $result = FlightStatHelper::getAirPortBy_IATACode_Date('PDX', 2013, 9, 24);
        $result = FlightStatHelper::getAirPortBy_ICAOCode('KPDX');
        $result = FlightStatHelper::getAirPortBy_ICAOCode_Date('KPDX', 2013, 9, 24);
        $result = FlightStatHelper::getAllWeatherProductsBy_AirPort('ABQ');
        $result = FlightStatHelper::getWeatherMETARFor_AirPort('ABQ');
        $result = FlightStatHelper::getWeatherTAFFor_AirPort('ABQ');
        $result = FlightStatHelper::getWeatherZoneForeCastFor_Airport('ABQ');
        $result = FlightStatHelper::createFlightRuleBy_Arrival('AA', '100', 'LHR', 2013, 9, 26, 'JSON', 'http://your.post.url');
        $result = FlightStatHelper::createFlightRuleBy_Departure('AA', '100', 'JFK', 2013, 9, 26, 'JSON', 'http://your.post.url');
        $result = FlightStatHelper::createFlightRuleForRouteBy_ArrivalDate('AA', '100', 'JFK', 'LHR', 2013, 9, 26, 'JSON', 'http://your.post.url');
        $result = FlightStatHelper::createFlightRuleForRouteBy_DepartureDate('AA', '100', 'JFK', 'LHR', 2013, 9, 26, 'JSON', 'http://your.post.url');
        $result = FlightStatHelper::deletePreviousRuleBy_Id(152546901);
        $result = FlightStatHelper::getPreviousRuleBy_Id(152546901);
        $result = FlightStatHelper::getAllAlertRuleIds();
        $result = FlightStatHelper::getAllAlertRuleIdsLessThan_Id(152545649);


        $result = FlightStatHelper::getAirportStatus_Departures('ABQ', '13', '2013', '9' , '24', false);
        $result = FlightStatHelper::getAirportStatus_Arrivals('ABQ', '13', '2013', '9' , '24', false);
        $result = FlightStatHelper::getAirportTrack_Departure('ABQ');
        $result = FlightStatHelper::getAirportTrack_Arrivals('ABQ');

        //usage exceed, please create new account
        $result = FlightStatHelper::getFleetStatusBy_Departure('AA', '13', '2013', '9' , '26', false);
        $result = FlightStatHelper::getFleetTracks('AA');


        $result = FlightStatHelper::getAllFlightsWithBoundingBox(45, -125, 40, -120);
        $result = FlightStatHelper::getAllFlightsWithinAreaBy_Point_Radius(45.00, -122.0, 25);

        $result = FlightStatHelper::getRouteStatusBy_ArrivalDate('PDX', 'HNL', '2013', '9' , '26');
        $result = FlightStatHelper::getRouteStatusBy_DepartureDate('PDX', 'HNL', '2013', '9' , '26');

        $result = FlightStatHelper::getFlightStatusBy_FlightId(100);
        $result = FlightStatHelper::getFlightStatusesBy_DepartedDate('AA', '100', '2013', '9' , '26');
        $result = FlightStatHelper::getFlightStatusesBy_ArrivalDate('AA', '100', '2013', '9' , '26');
        $result = FlightStatHelper::getFlightTrackBy_FlightId(100);
        $result = FlightStatHelper::getFlightTrackBy_DepartedDate('AA', '100', '2013', '9' , '26');
        $result = FlightStatHelper::getFlightTrackBy_ArrivalDate('AA', '100', '2013', '9' , '26');

        //get by JSON
        $result = FlightStatHelper::getFIDSDataForFlight_Departing_Airport('ABQ', 'airlineCode,flightNumber,city,currentTime,gate,remarks');
        $result = FlightStatHelper::getFIDSDataForFlight_Arriving_Airport('ABQ', 'airlineCode,flightNumber,city,currentTime,gate,remarks');`


I applied this library on my project on Yii, so then if anyone want to use this, please replace these line Yii::import with normal php such as [function.include](http://php.net/manual/en/function.include.php), [function.require](http://php.net/manual/en/function.require.php)