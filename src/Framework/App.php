<?php

declare(strict_types=1);

namespace Framework;

class App {
    const HTTP_GET_METHOD    = 'GET';
    const HTTP_POST_METHOD   = 'POST';
    const HTTP_PUT_METHOD    = 'PUT';
    const HTTP_DELETE_METHOD = 'DELETE';
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run() {
        echo "Application is running";
    }

    public function get(string $path, array $controller) {
        $this->router->add(self::HTTP_GET_METHOD, $path, $controller);
    }
}