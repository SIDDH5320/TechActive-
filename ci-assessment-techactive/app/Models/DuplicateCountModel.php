<?php

namespace App\Models;

use CodeIgniter\Model;

class DuplicateCountModel extends Model
{
    protected $table = 'duplicate_counts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','email', 'count'];

   
}