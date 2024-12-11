<?php
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
    protected $allowedFields    = ['numero', 'type','prix','description', 'statut', 'type_chambre_id'];

    public function getChambreById($id)
    {
        return $this->where('id', $id)->first();
    }
    public function getDisponibleChambre(){
        return $this->select('chambres.*')
                    ->where('chambres.statut', 'disponible')
                    ->findAll(); 
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

    public function getImages($chambreId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('images');
        return $builder->where('chambre_id', $chambreId)->get()->getResultArray();
    }
}