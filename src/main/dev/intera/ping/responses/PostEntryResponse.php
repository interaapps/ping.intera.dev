<?php
namespace dev\intera\ping\responses;

use de\interaapps\jsonplus\attributes\Serialize;
use de\interaapps\ulole\core\testing\factory\Faker;
use http\Client;

class PostEntryResponse
{
    public string $title;
    public string $contents = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley";
    public AuthorResponse $author;
    #[Serialize("created_at")]
    public string $createdAt;

    public function __construct() {
        $faker = new Faker();
        $this->title = $faker->name().' has been born!';
        $this->author = new AuthorResponse();
        $this->createdAt = $faker->randomNumber(1, 10).".".$faker->randomNumber(1, 10).".".$faker->randomNumber(1960, 2021)." ".$faker->randomNumber(1, 24).":".$faker->randomNumber(10, 60).":0000";
    }

}