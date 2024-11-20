<?php

namespace App\Models;

use CodeIgniter\Model;

class RapportModel extends Model
{
    protected $table            = 'rapports';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_rapport','contenu','created_at','updated_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;


   
}
