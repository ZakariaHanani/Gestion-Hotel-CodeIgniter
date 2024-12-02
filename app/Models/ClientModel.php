<?php
namespace App\Models;

class ClientModel extends UserModel
{
    protected $table            = 'clients';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = false; 
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'nom', 'prenom', 'telephone', 'adresse', 'created_at', 'updated_at'];

    public function getClientProfile($clientId)
    {
        return $this->select('clients.*, users.*')
                    ->join('users', 'users.id = clients.user_id')
                    ->where('clients.user_id', $clientId) 
                    ->first();
    }

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

   
}
