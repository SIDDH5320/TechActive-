<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class StatsController extends BaseController {
    
    use ResponseTrait;

    public function calculateStats() {
        // Check token
        $token = $this->request->getVar('token');
        if ($token !== session()->get('token')) {
            return $this->failUnauthorized('Unauthorized');
        }

        // Fetch total records
        $totalRecords = model('UserModel')->countAll();

        $duplicateRecords = 25; 

        return $this->respond(['duplicate_percentage' => $duplicateRecords, 'total_records' => $totalRecords]);
    }
}