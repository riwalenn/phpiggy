<?php

declare(strict_types=1);

namespace Framework;

class App {
    public const HTTP_GET_METHOD = 'GET';
//    const HTTP_POST_METHOD   = 'POST';
//    const HTTP_PUT_METHOD    = 'PUT';
//    const HTTP_DELETE_METHOD = 'DELETE';
    private Router $router;
    private Container $container;

    public function __construct(string $containerDefinitionsPath = null)
    {
        $this->router = new Router();
        $this->container = new Container();

        if ($containerDefinitionsPath) {
            $containerDefinitions = include $containerDefinitionsPath;
            $this->container->addDefinitions($containerDefinitions);
        }
    }

    public function run() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method, $this->container);
    }

    public function get(string $path, array $controller) {
        $this->router->add(self::HTTP_GET_METHOD, $path, $controller);
    }
}