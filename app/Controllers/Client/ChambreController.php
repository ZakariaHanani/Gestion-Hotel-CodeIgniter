<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ChambreModel;
use App\Models\ImageModel;
use App\Models\ReservationModel;
use Stripe\PaymentIntent;
use Stripe\Stripe;


class ChambreController extends BaseController
{

    public function index()
    {
        $chambreModel = new ChambreModel();
        $imageModel = new ImageModel();

        $chambres = $chambreModel->getDisponibleChambre();

        foreach ($chambres as &$chambre) {
            $chambre['images'] = $imageModel
                ->where('chambre_id', $chambre['id']) // Remplacez 'id' par le nom correct de la colonne de clé primaire
                ->findAll();
        }

        return view('client/chambres', [
            'chambres' => $chambres
        ]);
    }




}