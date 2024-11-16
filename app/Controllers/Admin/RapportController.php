<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\PaiementModel;
use App\Models\RapportModel;

class RapportController extends BaseController
{
    public function index()
    {
        // Récupérer les données de fréquentation des chambres
        $reservationModel = new ReservationModel();
        $reservations = $reservationModel->select('MONTH(created_at) as month, COUNT(*) as total')
                                         ->groupBy('MONTH(created_at)')
                                         ->findAll();

        // Récupérer les données des paiements
        $paiementModel = new PaiementModel();
        $chiffreAffaires = $paiementModel->selectSum('montant')->first();
        $paiementsMensuels = $paiementModel->select('MONTH(date) as month, SUM(montant) as total')
                                           ->groupBy('MONTH(date)')
                                           ->findAll();

        // Enregistrer le rapport de fréquentation des chambres
        $rapportModel = new RapportModel();
        $rapportModel->save([
            'donnees' => 'Rapport de fréquentation des chambres: ' . json_encode($reservations),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Enregistrer le rapport financier
        $rapportModel->save([
            'donnees' => 'Rapport financier: Chiffre d\'affaires total = ' . $chiffreAffaires['montant'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Retourner les données à la vue
        return view('admin/rapports/index', [
            'reservations' => $reservations,
            'chiffreAffaires' => $chiffreAffaires,
            'paiementsMensuels' => $paiementsMensuels
        ]);
    }
}
