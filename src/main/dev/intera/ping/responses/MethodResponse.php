<?php
namespace dev\intera\ping\responses;

use de\interaapps\jsonplus\attributes\Serialize;
use de\interaapps\jsonplus\JSONModel;
use de\interaapps\ulole\router\Request;
use de\interaapps\ulole\router\Router;

class MethodResponse
{
    use JSONModel;

    public string $method = "GET";
    public string $protocol = "HTTP 1/1";

    public string $domain = "";
    public bool $ssl = false;

    public string $uri = "";
    #[Serialize("full_url")]
    public string $fullUrl = "";

    public ?object $headers = null;

    public ?object $query = null;

    public ?array $params = null;

    public ?string $body = null;

    public ?array $cookies = null;

    #[Serialize("\$info")]
    public array $info = [
        "Information and Docs" => "https://intera.dev/ping",
        "routes" => [
            "*   /" => "Send any type of request and get response with your request information",
            "GET /{int:\$code}" => "Status code will be \$code",
            "GET /authors" => "Get a list of authors",
            "GET /authors/single" => "Get a single author",
            "GET /posts" => "Get a list of posts",
            "GET /posts/single" => "Get a single post",

            "GET /example.png" => "Get an example image (png)",
            "GET /example.svg" => "Get an example image (svg)",

            "GET /json" => "An array of routes for json testing",
        ]
    ];

    public function __construct(Request $req) {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->query = (object) $_GET;
        $this->headers = (object) getallheaders();

        $this->ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;

        $this->uri = explode("?", $req->getRequestURI())[0];
        $this->fullUrl = explode("?", ($this->ssl ? 'https' : 'http').'://'. $_SERVER["HTTP_HOST"].$req->getRequestURI())[0];

        $this->domain = $_SERVER["HTTP_HOST"];

        $this->protocol = $_SERVER["SERVER_PROTOCOL"];

        $this->cookies = $_COOKIE;

        if ($this->method != "GET"/* && $this->method != "OPTION"*/) {
            $this->body = file_get_contents('php://input');
            if ($this->body === "")
                $this->body = null;
        }

    }
}