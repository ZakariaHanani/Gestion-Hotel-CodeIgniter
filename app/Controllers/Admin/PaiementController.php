<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\PaiementModel;
use App\Models\ReservationModel;
use App\Models\ClientModel ;

class PaiementController extends BaseController
{
    public function index()
    {
        $paiementModel = new PaiementModel();
    
        // Récupérer les filtres depuis la requête GET
        $filters = [
            'reservation_id' => $this->request->getGet('reservation_id'),
            'methode' => $this->request->getGet('methode'),
            'statut' => $this->request->getGet('statut'),
        ];
    
        // Appliquer les filtres au modèle
        $query = $paiementModel;
        if (!empty($filters['reservation_id'])) {
            $query = $query->where('reservation_id', $filters['reservation_id']);
        }
        if (!empty($filters['methode'])) {
            $query = $query->where('methode', $filters['methode']);
        }
        if (!empty($filters['statut'])) {
            $query = $query->where('statut', $filters['statut']);
        }
    
        // Récupérer les paiements filtrés
        $data['paiements'] = $query->findAll();
        $data['filters'] = $filters; // Passer les filtres à la vue pour les garder sélectionnés
    
        return view('admin/paiements/index', $data);
    }
    

    public function add()
    {
        $reservationModel = new ReservationModel();
        $clientModel = new ClientModel();
        $data['reservations'] = $reservationModel->findAll();
        foreach($data['reservations'] as &$reservation){
            $reservation['client'] = $clientModel->getClientProfile($reservation['client_id']);
        }
        

        if ($this->request->getMethod() === 'POST') {
            $data = [
                'reservation_id' => $this->request->getPost('reservation_id'),
                'montant'        => $this->request->getPost('montant'),
                'methode'        => $this->request->getPost('methode'),
                'date'           => $this->request->getPost('date'),
                'statut'         => $this->request->getPost('statut'),
            ];

            $model = new PaiementModel();
            $model->save($data);

            return redirect()->to('/admin/paiements')->with('success', 'Paiement ajouté avec succès');
        }

        return view('admin/paiements/add', $data);
    }

    public function editStatut($id)
{
    $paiementModel = new PaiementModel();

    // Vérifier si le paiement existe
    $paiement = $paiementModel->find($id);
    if (!$paiement) {
        return redirect()->to('/admin/paiements')->with('error', 'Paiement introuvable');
    }

    // Passer les données à la vue
    $data = [
        'paiement' => $paiement,
    ];

    return view('admin/paiements/edit_statut', $data);
}


public function updateStatut($id)
{
    $paiementModel = new PaiementModel();
    $reservationModel = new ReservationModel();

    // Vérifier si le paiement existe
    $paiement = $paiementModel->find($id);
    if (!$paiement) {
        return redirect()->to('/admin/paiements')->with('error', 'Paiement introuvable');
    }

    // Récupérer le statut depuis le formulaire
    $statutPaiement = $this->request->getPost('statut');

    // Mettre à jour uniquement le statut du paiement
    $paiementModel->update($id, ['statut' => $statutPaiement]);

    // Définir le statut de la réservation en fonction du statut du paiement
    $statutReservation = 'en attente'; // Par défaut
    if ($statutPaiement === 'effectue') {
        $statutReservation = 'confirmée';
    } elseif ($statutPaiement === 'echoue') {
        $statutReservation = 'annulée';
    }

    // Mettre à jour le statut de la réservation correspondante
    $reservationModel->update($paiement['reservation_id'], ['statut' => $statutReservation]);

    return redirect()->to('/admin/paiements')->with('success', 'Statut du paiement et de la réservation mis à jour avec succès');
}




    // Generate a financial report for payments
     /* public function generateFinancialReport()
    {
        $model = new PaiementModel();
        $paiements = $model->findAll(); // Get all payments

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID Paiement')
              ->setCellValue('B1', 'Réservation ID')
              ->setCellValue('C1', 'Montant')
              ->setCellValue('D1', 'Méthode')
              ->setCellValue('E1', 'Date du Paiement')
              ->setCellValue('F1', 'Statut');

        $row = 2;
        foreach ($paiements as $paiement) {
            $sheet->setCellValue('A' . $row, $paiement['id']);
            $sheet->setCellValue('B' . $row, $paiement['reservation_id']);
            $sheet->setCellValue('C' . $row, $paiement['montant']);
            $sheet->setCellValue('D' . $row, $paiement['methode']);
            $sheet->setCellValue('E' . $row, $paiement['date']);
            $sheet->setCellValue('F' . $row, $paiement['statut']);
            $row++;
        }

        // Save and download as an Excel file
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Rapport_Financier_' . date('Y-m-d') . '.xlsx';

        // Output headers for the browser to download the file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }*/
}
