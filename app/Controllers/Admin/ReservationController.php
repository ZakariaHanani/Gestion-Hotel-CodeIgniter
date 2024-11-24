<?php

namespace App\Controllers\Admin;

use App\Models\PaiementModel;
use App\Models\ReservationModel;
use App\Models\ClientModel;
use App\Models\ChambreModel;
use CodeIgniter\Controller;

class ReservationController extends Controller
{
    protected $reservationModel;
    protected $clientModel;
    protected $chambreModel;
    protected $paiementModel ;

    public function __construct()
    {
        $this->reservationModel = new ReservationModel();
        $this->clientModel = new ClientModel();
        $this->chambreModel = new ChambreModel();
        $this->paiementModel= new PaiementModel(); 
        
    }

    public function index()
    {
        $filters = $this->request->getGet();
        $builder = $this->reservationModel->builder();
    
        if (!empty($filters['statut'])) {
            $builder->where('statut', $filters['statut']);
        }
        $reservations = $builder->get()->getResultArray();
    
        foreach ($reservations as &$reservation) {
            $reservation['client'] = $this->clientModel->find($reservation['client_id']);
            $reservation['chambre'] = $this->chambreModel->find($reservation['chambre_id']);
        }
    
        $data['reservations'] = $reservations;
        $data['filters'] = $filters;
    
        return view('admin/reservations/index', $data);
    }




    public function create()
    {
        $data['clients'] = $this->clientModel->findAll();
        $data['chambres'] = $this->chambreModel->findAll();
        return view('admin/reservations/create', $data);
    }

    public function store()
    {

        $dateDebut =$this->request->getPost('date_debut') ;
        $dateFin =$this->request->getPost('date_fin');
        $chambreId=$this->request->getPost('chambre_id') ;
        $methode =$this->request->getPost('methode') ;

         $dateArrivee = new \DateTime($dateDebut);
         $dateDepart = new \DateTime($dateFin);
         $days = $dateDepart->diff($dateArrivee)->days;
         if ($days < 1) {
            return redirect()->back()->with('error', 'La durée du séjour doit être d\'au moins 1 jour.');
        }

        $chambre = $this->chambreModel->find($chambreId);
        if (!$chambre) {
            return redirect()->back()->with('error', 'Chambre introuvable.');
        }

        $montant = $days * $chambre['prix'];


    if (strtotime($dateDebut) < strtotime(date('Y-m-d'))) {
        return redirect()->back()->with('error', 'La date de début ne peut pas être dans le passé.');
    }

    if (strtotime($dateFin) <= strtotime($dateDebut)) {
        return redirect()->back()->with('error', 'La date de fin doit être après la date de début.');
    }

    $existingReservations = $this->reservationModel
    ->where('chambre_id', $chambreId)
    ->where('statut !=', 'terminée')
    ->groupStart() 
        ->where('date_debut <=', $dateFin)
        ->where('date_fin >=', $dateDebut)
    ->groupEnd()
    ->findAll();


    if (!empty($existingReservations)) {
        return redirect()->back()->with('error', 'Les dates sélectionnées chevauchent une autre réservation pour cette chambre.');
    }
       $reservationId = $this->reservationModel->insert([
        'client_id' => $this->request->getPost('client_id'),
        'chambre_id' => $chambreId,
        'date_debut' =>$dateDebut,
        'date_fin' =>$dateFin,
    ]); 
    
    if (!$reservationId) {
        return redirect()->back()->with('error', 'Erreur lors de la création de la réservation.');
    }

    $this->paiementModel->insert([
        'reservation_id' => $reservationId,
        'montant' => $montant,
        'methode' => $methode ?? 'non_specifiee',
        'date' => date('Y-m-d H:i:s'),
        'statut' => 'en_attente', 
    ]);

        $this->chambreModel->update($this->request->getPost('chambre_id'), ['statut' => 'occupe']);
        return redirect()->to('/admin/reservations')->with('message', 'Réservation créée avec succès');
    }

    

    public function edit($id)
    {
        $data['reservation'] = $this->reservationModel->find($id);
        $data['clients'] = $this->clientModel->findAll();
        $data['chambre'] = $this->chambreModel->getChambreById($data['reservation']['chambre_id']);


        return view('admin/reservations/edit', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'POST') {        
            $data = [
                'client_id' => $this->request->getPost('client_id'),
                'date_debut' => $this->request->getPost('date_debut'),
                'date_fin' => $this->request->getPost('date_fin'),
                'statut' =>$this->request->getPost('statut'),
                'chambre_id' =>$this->request->getPost('chambre_id')
            ];

            if ($data['statut'] == 'terminée' || $data['statut'] == 'annulée') {
                $this->chambreModel->update($data['chambre_id'], ['statut' => 'disponible']);
            }
            else{
                $this->chambreModel->update($data['chambre_id'], ['statut' => 'occupe']);
            }
            $this->reservationModel->update($id, $data);
            $paiement = $this->paiementModel->where('reservation_id', $id)->first();

            if ($paiement) {
                $paiementData = [
                    'statut' => $this->getPaiementStatutFromReservation($data['statut']),
                    'date' => date('Y-m-d H:i:s'), // Mettre à jour la date de modification
                ];
                $this->paiementModel->update($paiement['id'], $paiementData);
            }
            return redirect()->to('/admin/reservations')->with('message', 'Réservation mise a jour avec succès');
        }
    }


    public function delete($id)
    {
        $reservation = $this->reservationModel->find($id);

        if ($reservation) {
            $this->chambreModel->update($reservation['chambre_id'], ['statut' => 'disponible']);
            
            $this->reservationModel->delete($id);
        }
        return redirect()->to('/admin/reservations');
    }

    private function getPaiementStatutFromReservation($reservationStatut)
{
    switch ($reservationStatut) {
        case 'confirmée':
            return 'effectue';
        case 'annulée':
            return 'echoue';
        default:
            return 'en_attente';
    }
}

public function updateStatusAutomatically()
{
    $reservations = $this->reservationModel->where('statut !=', 'terminée')->findAll();
    foreach ($reservations as $reservation) {
        if (strtotime($reservation['date_fin']) < time()) {
            $this->reservationModel->update($reservation['id'], [
                'statut' => 'terminée'
            ]);
            $this->chambreModel->update($reservation['chambre_id'], ['statut' => 'disponible']);

        }
    }
}


}
