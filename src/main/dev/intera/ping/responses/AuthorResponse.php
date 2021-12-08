<?php

namespace dev\intera\ping\responses;

use de\interaapps\jsonplus\attributes\Serialize;
use de\interaapps\ulole\core\testing\factory\Faker;

class AuthorResponse
{
    public string $name;
    #[Serialize("user_name")]
    public string $userName;
    public AddressResponse $address;

    public function __construct() {
        $faker = new Faker();
        $this->name = $faker->fullName();

        $this->userName = $faker->name().$faker->randomNumber(1111, 9999);
        $this->address = new AddressResponse();
    }
}