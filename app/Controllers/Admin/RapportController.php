<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\PaiementModel;
use App\Models\RapportModel;
use Dompdf\Dompdf;

class RapportController extends BaseController
{
    // Display reports overview
    public function index()
    {
        $reservationModel = new ReservationModel();
        $reservations = $reservationModel->select('MONTH(created_at) as month, COUNT(*) as total')
                                         ->groupBy('MONTH(created_at)')
                                         ->findAll();

        $paiementModel = new PaiementModel();
        $chiffreAffaires = $paiementModel->selectSum('montant')->first();
        $paiementsMensuels = $paiementModel->select('MONTH(date) as month, SUM(montant) as total')
                                           ->groupBy('MONTH(date)')
                                           ->findAll();

        $rapportModel = new RapportModel();
        $rapportModel->save([
            'donnees' => 'Rapport de fréquentation des chambres: ' . json_encode($reservations),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $rapportModel->save([
            'donnees' => 'Rapport financier: Chiffre d\'affaires total = ' . $chiffreAffaires['montant'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return view('admin/rapports/index', [
            'reservations' => $reservations,
            'chiffreAffaires' => $chiffreAffaires,
            'paiementsMensuels' => $paiementsMensuels
        ]);
    }

    // Generate and display revenue report
    public function revenus()
    {
        $paiementModel = new PaiementModel();
        $mois = $this->request->getVar('mois') ?? date('m');
        $annee = $this->request->getVar('annee') ?? date('Y');
        
        $revenus = $paiementModel
            ->select('SUM(montant) as total')
            ->where('YEAR(date)', $annee)
            ->where('MONTH(date)', $mois)
            ->first();
    
        $data = [
            'revenus' => $revenus['total'] ?? 0,
            'mois' => $mois,
            'annee' => $annee
        ];
    
        return view('Admin/rapports/revenus', $data);
    }

    // Download revenue report as PDF
    public function telechargerRevenusPDF($mois, $annee)
    {
        $paiementModel = new PaiementModel();
        $revenus = $paiementModel
            ->select('SUM(montant) as total')
            ->where('YEAR(date)', $annee)
            ->where('MONTH(date)', $mois)
            ->first();

        $data = [
            'revenus' => $revenus['total'] ?? 0,
            'mois' => $mois,
            'annee' => $annee
        ];

        $html = view('Admin/rapports/revenus_pdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("rapport_revenus_{$mois}_{$annee}.pdf");
    }

    // Popular room types report
   public function chambresPopularite()
{
    $reservationModel = new ReservationModel();
    $data['statistiques'] = $reservationModel
        ->select('type_chambre.nom as type_chambre_nom, type_chambre.description as type_chambre_description, COUNT(*) as total')
        ->join('chambres', 'reservations.chambre_id = chambres.id')
        ->join('type_chambre', 'chambres.type_chambre_id = type_chambre.id')
        ->groupBy('type_chambre.id')
        ->orderBy('total', 'DESC')
        ->findAll();
    return view('Admin/rapports/chambres_popularite', $data);
}

}
