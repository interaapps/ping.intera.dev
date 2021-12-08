<?php
namespace dev\intera\ping;

use de\interaapps\ulole\router\Request;
use de\interaapps\ulole\router\Response;
use de\interaapps\ulole\router\Router;
use dev\intera\ping\controller\AuthorsController;
use dev\intera\ping\controller\JsonController;
use dev\intera\ping\controller\MethodsController;
use de\interaapps\ulole\core\Environment;
use de\interaapps\ulole\core\WebApplication;
use de\interaapps\ulole\core\traits\Singleton;
use dev\intera\ping\controller\PostsController;

class App extends WebApplication {

    use Singleton;

    public function __construct() {
        self::setInstance($this);
    }

    public function init(){
    }

    public function run() {
        $router = $this->getRouter();
        $router->getJsonPlus()->setPrettyPrinting(true);

        // $router->get("/", fn(Request $req, Response $res) => $res->redirect("https://intera.dev/ping"));

        $router->notFound(fn() => [
            "error" => "page not found"
        ]);

        $router->addController(MethodsController::class);
        $router->addController(PostsController::class);
        $router->addController(AuthorsController::class);
        $router->addController(JsonController::class);
    }

    public static function main(Environment $environment){
        (new self())->start($environment);
    }
}
