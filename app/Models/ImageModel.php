<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table            = 'images'; // The name of your images table
    protected $primaryKey       = 'id'; // Primary key for the table
    protected $useAutoIncrement = true; // Auto-increment primary key
    protected $returnType       = 'array'; // Return data as an array
    protected $useSoftDeletes   = false; // Soft delete not used here

    protected $allowedFields    = ['chambre_id', 'image_path', 'created_at', 'updated_at']; // Columns that can be updated/inserted

    // Dates
    protected $useTimestamps = true; // Enable automatic timestamps
    protected $dateFormat    = 'datetime'; // Format for timestamps
    protected $createdField  = 'created_at'; // Column for creation timestamp
    protected $updatedField  = 'updated_at'; // Column for update timestamp

    // Validation
    protected $validationRules = [
        'chambre_id' => 'required|integer',
        'image_path' => 'required|string|max_length[255]'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * Get all images associated with a specific room
     *
     * @param int $chambreId
     * @return array
     */
    public function getImagesByChambreId(int $chambreId): array
    {
        return $this->where('chambre_id', $chambreId)->findAll();
    }

    /**
     * Delete all images associated with a specific room
     *
     * @param int $chambreId
     * @return bool
     */
    public function deleteImagesByChambreId(int $chambreId): bool
    {
        return $this->where('chambre_id', $chambreId)->delete();
    }
}
