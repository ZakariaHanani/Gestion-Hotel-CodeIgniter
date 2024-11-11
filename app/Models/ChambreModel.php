<?php
// app/Models/ChambreModel.php
namespace App\Models;

use CodeIgniter\Model;

class ChambreModel extends Model
{
    protected $table            = 'chambres';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['numero', 'prix','description', 'statut', 'type_chambre_id'];

    public function getChambreById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getWithType($id = null)
    {
        if ($id) {
            return $this->select('chambres.*, type_chambre.nom as type_nom, type_chambre.description as type_description')
                        ->join('type_chambre', 'type_chambre.id = chambres.type_chambre_id')
                        ->where('chambres.id', $id)
                        ->first();
        } else {
            return $this->select('chambres.*, type_chambre.nom as type_nom, type_chambre.description as type_description')
                        ->join('type_chambre', 'type_chambre.id = chambres.type_chambre_id')
                        ->findAll(); 
        }
    }
}