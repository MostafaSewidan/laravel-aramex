<?php

namespace ExtremeSa\Aramex\API\Requests\Shipping;

use ExtremeSa\Aramex\API\Interfaces\Normalize;
use ExtremeSa\Aramex\API\Requests\API;

/**
 * This method allows users to get all the cities within a certain country (country code).
 * And allows users to get list of the cities that start with a specific prefix.
 * The required nodes to be filled are Client Info and Country Code.
 *
 * Class FetchCities
 * @package ExtremeSa\Aramex\API\Requests\Location
 */
class ShippingAbstract extends API implements Normalize
{
    public function __construct()
    {
        parent::__construct();
        $this->live_wsdl = $this->live_wsdl . '/shippingapi.v2/shipping/service_1_0.svc?wsdl';
        $this->test_wsdl = $this->test_wsdl . '/shippingapi.v2/shipping/service_1_0.svc?wsdl';

        $this->soapClient = new \SoapClient($this->getWsdlAccordingToEnvironment(), array('trace' => 1));
    }
}