<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model

{
    protected $table            = 'reservations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['client_id','chambre_id','date_debut','date_fin','statut'];

    public function countReservationsByClient($clientId)
{
    return $this->where('client_id', $clientId)->countAllResults();
}
  

}
