<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends UserModel
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','permissions'];


    public function getAdminProfile($adminId)
    {
        return $this->select('admins.*, users.*')
                    ->join('users', 'users.id = admins.user_id')
                    ->where('admins.user_id', $adminId)
                    ->first();
    }

}
