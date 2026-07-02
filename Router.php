<?php

class Router {
    // Encapsulation: The routing table is hidden from direct modification
    private array $routes = [];

    // Public setter method to register paths
    public function add(string $path, string $controller, string $action): void {
        $this->routes[$path] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    // Handles executing the right controller action based on the URL
    public function dispatch(string $uri): void {
        // Strip query strings if any (e.g., /profile?id=1 -> /profile)
        $path = parse_url($uri, PHP_URL_PATH);

        if (array_key_exists($path, $this->routes)) {
            $controllerName = $this->routes[$path]['controller'];
            $action = $this->routes[$path]['action'];

            // Polymorphism & Dynamic Instantiation:
            // We instantiate the class and call the method dynamically by name
            if (class_exists($controllerName)) {
                $controllerInstance = new $controllerName();
                
                if (method_exists($controllerInstance, $action)) {
                    $controllerInstance->$action();
                    return;
                }
            }
        }

        // Fallback fallback if route doesn't exist
        $this->httpNotFound();
    }

    private function httpNotFound(): void {
        http_response_code(404);
        echo "404 - Page Not Found\n";
    }
}