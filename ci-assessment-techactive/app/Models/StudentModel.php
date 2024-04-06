<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class StudentModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'email', 
        'name', 
        'age',
        
    ];
}