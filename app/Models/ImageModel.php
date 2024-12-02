<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table            = 'images'; 
    protected $primaryKey       = 'id'; 
    protected $useAutoIncrement = true; 
    protected $returnType       = 'array'; 
    protected $useSoftDeletes   = false; 
    protected $allowedFields    = ['chambre_id', 'image_path', 'created_at', 'updated_at']; 

    

    protected $useTimestamps = true; 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 

    protected $validationRules = [
        'chambre_id' => 'required|integer',
        'image_path' => 'required|string|max_length[255]'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * 
     *
     * @param int $chambreId
     * @return array
     */
    public function getImagesByChambreId(int $chambreId): array
    {
        return $this->where('chambre_id', $chambreId)->findAll();
    }

    /**
     * 
     *
     * @param int $chambreId
     * @return bool
     */
    public function deleteImagesByChambreId(int $chambreId): bool
    {
        return $this->where('chambre_id', $chambreId)->delete();
    }
}
