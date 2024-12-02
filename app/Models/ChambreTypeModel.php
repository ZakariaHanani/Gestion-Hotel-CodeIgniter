<?php
namespace App\Models;

use CodeIgniter\Model;

class ChambreTypeModel extends Model
{
    protected $table = 'type_chambre';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nom', 'description'];
}
