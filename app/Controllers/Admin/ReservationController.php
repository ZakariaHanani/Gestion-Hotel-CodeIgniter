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
        $this->reservationModel->insert([
            'client_id' => $this->request->getPost('client_id'),
            'chambre_id' => $this->request->getPost('chambre_id'),
            'date_debut' => $this->request->getPost('date_debut'),
            'date_fin' => $this->request->getPost('date_fin'),
        ]);

        return redirect()->to('/admin/reservations')->with('message', 'Réservation créée avec succès');
    }

    public function edit($id)
    {
        $data['reservation'] = $this->reservationModel->find($id);
        $data['clients'] = $this->clientModel->findAll();
        $data['chambres'] = $this->chambreModel->findAll();

        return view('admin/reservations/edit', $data);
    }
}
