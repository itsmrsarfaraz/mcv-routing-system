<?php

include 'Router.php';
include 'Controller.php';
include 'UserController.php';

// 1. Initialize the Router
$router = new Router();

// 2. Register your Application Routes
$router->add('/profile', UserController::class, 'profile');

// 3. Simulate incoming HTTP requests
echo "Simulating request to '/profile':<br>";
$router->dispatch('/profile'); 

echo "<br>-----------------------------------<br><br>";

echo "Simulating request to '/dashboard' (unregistered):<br>";
$router->dispatch('/dashboard');