<?php
namespace dev\intera\ping\controller;

use de\interaapps\ulole\router\attributes\Controller;
use de\interaapps\ulole\router\attributes\Route;
use de\interaapps\ulole\router\Request;
use de\interaapps\ulole\router\Response;
use dev\intera\ping\responses\MethodResponse;

#[Controller]
class MethodsController {
    #[Route("/", method: "GET")]
    public static function get(Request $req, Response $res){
        return new MethodResponse($req);
    }

    #[Route("/", method: "HEAD")]
    public static function head(Request $req){ return new MethodResponse($req); }
    #[Route("/", method: "POST")]
    public static function post(Request $req){ return new MethodResponse($req); }
    #[Route("/", method: "PUT")]
    public static function put(Request $req){ return new MethodResponse($req); }
    #[Route("/", method: "DELETE")]
    public static function delete(Request $req){ return new MethodResponse($req); }
    #[Route("/", method: "CONNECT")]
    public static function connect(Request $req){ return new MethodResponse($req); }
    #[Route("/", method: "OPTIONS")]
    public static function options(Request $req){ return new MethodResponse($req); }
    #[Route("/", method: "TRACE")]
    public static function trace(Request $req){ return new MethodResponse($req); }
    #[Route("/", method: "PATCH")]
    public static function patch(Request $req){ return new MethodResponse($req); }

    #[Route("/([0-9][0-9][0-9])", method: "GET")]
    public static function code(Request $req, Response $res, $code){
        $res->setCode($code);
        $text = match ($code) {
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Moved Temporarily',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Time-out',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Large',
            415 => 'Unsupported Media Type',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Time-out',
            505 => 'HTTP Version not supported',
            default => "Unkown status code",
        };
        return [
            "code" => intval($code),
            "message" => $text
        ];
    }
}