<?php

abstract class Controller {
    // Abstraction: Common logic shared by all controllers
    protected function render(string $view, array $data = []): void {
        extract($data); // Turns ['name' => 'John'] into $name
        
        echo "--- Rendering View: [$view] ---\n";
        // In a full app, you would include a file here: include "views/$view.php";
        if (isset($user)) {
            echo "Welcome back, " . htmlspecialchars($user) . "!\n";
        }
    }
}