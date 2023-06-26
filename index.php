<?php
class Router {
    private $routes = [];

    public function addRoute($uri, $callback) {
        $this->routes[$uri] = $callback;
    }

    public function dispatch() {
        $uri = $_SERVER['REQUEST_URI'];
		$uri = str_replace('/router', '', $uri);
        if (isset($this->routes[$uri])) {
            $callback = $this->routes[$uri];
            call_user_func($callback);
        } else {
            echo '404 Not Found';
        }
    }
}

$router = new Router();

$router->addRoute('/', function() {
    echo 'Homepage';
});

$router->addRoute('/about', function() {
    echo 'About Us';
});

$router->dispatch();
