<?php

namespace App\Controllers\Admin;

use App\Models\ReservationModel;
use App\Models\ClientModel;
use App\Models\ChambreModel;
use CodeIgniter\Controller;

class ReservationController extends Controller
{
    protected $reservationModel;
    protected $clientModel;
    protected $chambreModel;

    public function __construct()
    {
        $this->reservationModel = new ReservationModel();
        $this->clientModel = new ClientModel();
        $this->chambreModel = new ChambreModel();
    }

    public function index()
    {
        $reservations = $this->reservationModel->findAll();
        foreach ($reservations as &$reservation) {
            $reservation['client'] = $this->clientModel->find($reservation['client_id']);
            $reservation['chambre'] = $this->chambreModel->find($reservation['chambre_id']);
        }
        $data['reservations'] = $reservations;

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
        
         // Check if date_debut is in the past
    if (strtotime($dateDebut) < strtotime(date('Y-m-d'))) {
        return redirect()->back()->with('error', 'La date de début ne peut pas être dans le passé.');
    }

    // Check if date_fin is before date_debut
    if (strtotime($dateFin) <= strtotime($dateDebut)) {
        return redirect()->back()->with('error', 'La date de fin doit être après la date de début.');
    }

    // Check for overlaps with existing reservations
    $existingReservations = $this->reservationModel
    ->where('chambre_id', $chambreId)
    ->where('statut !=', 'terminée')
    ->groupStart() // Start grouping conditions
        ->where('date_debut <=', $dateFin)
        ->where('date_fin >=', $dateDebut)
    ->groupEnd() // End grouping conditions
    ->findAll();

    print_r($existingReservations);

    if (!empty($existingReservations)) {
        return redirect()->back()->with('error', 'Les dates sélectionnées chevauchent une autre réservation pour cette chambre.');
    }
        $this->reservationModel->insert([
        'client_id' => $this->request->getPost('client_id'),
        'chambre_id' => $chambreId,
        'date_debut' =>$dateDebut,
        'date_fin' =>$dateFin,
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
}
