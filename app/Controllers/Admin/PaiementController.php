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
        $model = new PaiementModel();
        $data['paiements'] = $model->findAll(); 
        return view('Admin/Paiements/index', $data);
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
