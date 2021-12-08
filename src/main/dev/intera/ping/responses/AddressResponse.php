<?php

namespace dev\intera\ping\responses;

use de\interaapps\jsonplus\attributes\Serialize;
use de\interaapps\ulole\core\testing\factory\Faker;

class AddressResponse
{
    public string $country;
    public string $city;
    public string $street;
    #[Serialize("street_number")]
    public string $streetNumber;

    public function __construct() {
        $faker = new Faker();
        $this->country = $faker->country();
        $this->city = $faker->city();
        $this->street = $faker->random(7);
        $this->streetNumber = $faker->randomNumber(1, 50);
    }
}