<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class TokenController extends BaseController {
    
    use ResponseTrait;

    public function generateToken() {
       
        $token = bin2hex(random_bytes(16));

        // Store the token in the session
        session()->set('token', $token);

        // Return the generated token
        return $this->respond(['token' => $token]);
    }
}