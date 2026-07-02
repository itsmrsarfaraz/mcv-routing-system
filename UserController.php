<?php

class UserController extends Controller {
    // This method handles the logic when someone visits /profile
    public function profile(): void {
        // Simulating fetching data from a Model
        $userData = ['user' => 'Sarfaraz'];
        
        // Call the inherited render method from the parent Controller
        $this->render('profile', $userData);
    }
}