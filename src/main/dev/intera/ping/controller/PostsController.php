<?php
namespace dev\intera\ping\controller;

use de\interaapps\ulole\router\attributes\Controller;
use de\interaapps\ulole\router\attributes\Route;
use de\interaapps\ulole\router\Request;
use de\interaapps\ulole\router\Response;
use dev\intera\ping\responses\MethodResponse;
use dev\intera\ping\responses\PostEntryResponse;

#[Controller("/posts")]
class PostsController {
    #[Route("", method: "GET")]
    public static function list(Request $req, Response $res){
        return [new PostEntryResponse(), new PostEntryResponse(), new PostEntryResponse(), new PostEntryResponse(), new PostEntryResponse(), new PostEntryResponse()];
    }


    #[Route("/([A-Za-z0-9]*)", method: "GET")]
    public static function single(Request $req, Response $res){
        return new PostEntryResponse();
    }
}