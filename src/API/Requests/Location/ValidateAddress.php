<?php

namespace ExtremeSa\Aramex\API\Requests\Location;

use ExtremeSa\Aramex\API\Classes\Address;
use ExtremeSa\Aramex\API\Interfaces\Normalize;
use ExtremeSa\Aramex\API\Requests\API;
use ExtremeSa\Aramex\API\Response\Location\AddressValidationResponse;

/**
 * This method Allows users to search for certain addresses and make sure that the address structure is correct.
 * The required nodes  to be filled are Client Info and Address,
 *
 * Class ValidateAddress
 * @package ExtremeSa\Aramex\API\Requests\Location
 */
class ValidateAddress extends LocationAbstract implements Normalize
{
    private $address;

    /**
     * @return AddressValidationResponse
     * @throws \Exception
     */
    public function run()
    {
        $this->validate();

        return AddressValidationResponse::make($this->soapClient->ValidateAddress($this->normalize()));
    }

    public function validate()
    {
        parent::validate();

        if (!$this->address) {
            throw new \Exception('Address should be provided.!');
        }

    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return ValidateAddress
     */
    public function setAddress(Address $address): ValidateAddress
    {
        $this->address = $address;
        return $this;
    }


    public function normalize(): array
    {
        return array_merge([
            'Address' => $this->getAddress()->normalize()
        ], parent::normalize());
    }
}