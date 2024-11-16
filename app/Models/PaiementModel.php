<?php

namespace App\Models;

use CodeIgniter\Model;

class PaiementModel extends Model
{
    protected $table            = 'paiements';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['reservation_id', 'montant', 'methode', 'date', 'statut'];
    protected $useTimestamps    = false;

    // Validation rules (if any)
    protected $validationRules      = [
        'reservation_id' => 'required|integer',
        'montant'        => 'required|decimal',
        'methode'        => 'required|string|max_length[50]',
        'date'           => 'required|valid_date',
        'statut'         => 'required|string|in_list[en_attente,effectue,echoue]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    // You can add custom methods for specific queries if needed
}
