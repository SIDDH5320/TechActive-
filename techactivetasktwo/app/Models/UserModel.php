<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'email'];

    public function searchUsers($searchTerm)
    {
        return $this->like('first_name', $searchTerm)
                    ->orLike('last_name', $searchTerm)
                    ->orLike('email', $searchTerm)
                    ->paginate();
    }
}
