<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ChambreModel;
use App\Models\PaiementModel;
use App\Models\ReservationModel;
use DateTime;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends BaseController
{
    /**
     * @throws \Exception
     */
    public function createCheckoutSession()
    {
        $chambreModel = new ChambreModel();
        $chambre = $chambreModel->getChambreById($this->request->getPost("chambre_id"));
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')
                ->with('error', 'Veuillez vous inscrire ou vous connecter pour accéder à cette page.');
        }


        if (!$chambre ) {
            return redirect()->back()->with('error', 'Chambre introuvable.');
        }

        $stripeConfig = new \Config\Stripe();
        Stripe::setApiKey($stripeConfig->secretKey);

        $dateDebut = $this->request->getPost('date_debut');
        $dateFin = $this->request->getPost('date_fin');

        $startDate = new DateTime($dateDebut);
        $endDate = new DateTime($dateFin);
        $interval = $startDate->diff($endDate);

        if ($interval->days <= 0) {
            return redirect()->back()->with('validation', 'La date de fin doit être postérieure à la date de début.');
        }

        $nombreNuits = $interval->days;


        $montantTotal = $chambre['prix'] * $nombreNuits * 100;
        $num = $chambre['numero'];
        session()->set([
            'chambre_id' => $chambre['id'],
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'montant_total' => $montantTotal / 100,
        ]);
        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'mad',
                        'product_data' => [
                            'name' => 'Réservation Chambre Numéro: ' . $num,
                        ],
                        'unit_amount' => $montantTotal,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => base_url('payment/success?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => base_url('payment/cancel'),
            ]);
            return redirect()->to($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function success()
    {
        $reservationModel = new ReservationModel();
        $paiementModel = new PaiementModel();
        $chambreModel=new ChambreModel();

        $reservationData = [
            'client_id' => session()->get('user_id'),
            'chambre_id' => session()->get('chambre_id'),
            'date_debut' => session()->get('date_debut'),
            'date_fin' => session()->get('date_fin'),
            'statut' => 'confirmée',
        ];

        if ($reservationModel->save($reservationData)) {
            $chambreModel->update(session()->get('chambre_id'), ['statut' => 'occupe']);
            $reservation_id = $reservationModel->getInsertID();
            $paiementData = [
                'reservation_id' => $reservation_id,
                'montant' => session()->get('montant_total'),
                'methode' => 'card',
                'date'=>session()->get('date_debut'),
                'statut' => 'effectue',
            ];

            $paiementModel->save($paiementData);

            return view('payment/success');
        } else {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la confirmation de la réservation.');
        }
    }


    public function cancel()
    {
        return view('payment/cancel');
    }
}
