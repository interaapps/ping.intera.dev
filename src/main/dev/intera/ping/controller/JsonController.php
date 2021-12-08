<?php

namespace dev\intera\ping\controller;

use de\interaapps\jsonplus\attributes\Serialize;
use de\interaapps\ulole\core\testing\factory\Faker;
use de\interaapps\ulole\router\attributes\Controller;
use de\interaapps\ulole\router\attributes\Route;
use de\interaapps\ulole\router\Request;
use de\interaapps\ulole\router\Response;
use dev\intera\ping\responses\AddressResponse;
use dev\intera\ping\responses\PostEntryResponse;

#[Controller("/json")]
class JsonController
{

    #[Route("", method: "GET")]
    public static function index() {
        return [
            "/json/array",
            "/json/array/integers",
            "/json/array/floats",
            "/json/array/strings",
            "/json/array/booleans",
            "/json/array/objects",

            "/json/integer",
            "/json/float",
            "/json/string",
            "/json/boolean",
            "/json/object",
        ];
    }

    #[Route("/array", method: "GET")]
    public static function array() {
        return ["Hello World", 1234, false, 53.12, [
            "id" => "asd-test"
        ], [123, 432, 123]];
    }

    #[Route("/array/arrays", method: "GET")]
    public static function arraysArray() {
        return [[123,43], [43],[]];
    }
    #[Route("/array/strings", method: "GET")]
    public static function stringArray() {
        return ["Test 1", "Test 2", "Test 3"];
    }
    #[Route("/array/integers", method: "GET")]
    public static function intArray() {
        return [rand(0,9), rand(0,99), rand(0,999), rand(0,9999), rand(0,9999)];
    }
    #[Route("/array/floats", method: "GET")]
    public static function floatsArray() {
        return [rand(0,9)/rand(1,49), rand(0,99)/rand(1,49), rand(0,999)/rand(1,49), rand(0,9999)/rand(1,49), rand(0,9999)/rand(1,49)];
    }
    #[Route("/array/objects", method: "GET")]
    public static function objectArray() {
        return [["key" => "value"], ["key" => "value 2"], ["key" => "value 3"]];
    }

    #[Route("/array/booleans", method: "GET")]
    public static function booleansArray() {
        return [rand(0,1) === 1, rand(0,1) === 1, rand(0,1) === 1];
    }

    #[Route("/boolean", method: "GET")]
    public static function boolean(Request $r, Response $res) {
        $res->json(rand(0,1) === 1);
    }

    #[Route("/boolean/(true|false)", method: "GET")]
    public static function booleanVal(Request $r, Response $res, $val) {
        $res->json(strtolower($val) == "true");
    }


    #[Route("/string", method: "GET")]
    public static function str(Request $r, Response $res) {
        $faker = new Faker();
        $res->json($faker->fullName()." is living in ".$faker->city().', '.$faker->country());
    }

    #[Route("/integer", method: "GET")]
    public static function integer(Request $r, Response $res) {
        $res->json(rand(0, 9999999));
    }

    #[Route("/float", method: "GET")]
    public static function float(Request $r, Response $res) {
        $res->json(rand(0, 999999999999)/rand(64,99999));
    }

    #[Route("/null", method: "GET")]
    public static function null(Request $r, Response $res) {
        $res->json(null);
    }

    #[Route("/object", method: "GET")]
    public static function object(Request $r, Response $res) {
        $faker = new Faker();
        return [
            "name" =>$faker->fullName(),
            "address" => new AddressResponse(),
            "liked_posts" => [
                new PostEntryResponse(),
                new PostEntryResponse(),
                new PostEntryResponse(),
            ]
        ];
    }

}