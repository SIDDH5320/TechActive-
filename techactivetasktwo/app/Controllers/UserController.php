<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController {
    
    use ResponseTrait;

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function fetchUsers($page = 1) {
        // Check token
        $token = $this->request->getVar('token');
        if ($token !== session()->get('token')) {
            return $this->failUnauthorized('Unauthorized');
        }

        // pagination
        $limit = 10;
        $offset = ($page - 1) * $limit;

       
        $users = $this->userModel->paginate($limit, 'default', $offset);
        $pager = $this->userModel->pager;

        return $this->respond(['users' => $users, 'pager' => $pager]);
    }
}