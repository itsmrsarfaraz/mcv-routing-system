<?php

// 1. Initialize the Router
$router = new Router();

// 2. Register your Application Routes
$router->add('/profile', UserController::class, 'profile');

// 3. Simulate incoming HTTP requests
echo "Simulating request to '/profile':\n";
$router->dispatch('/profile'); 

echo "\n-----------------------------------\n\n";

echo "Simulating request to '/dashboard' (unregistered):\n";
$router->dispatch('/dashboard');