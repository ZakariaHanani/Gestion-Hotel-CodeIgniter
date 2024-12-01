<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\ReservationModel;
use App\Models\UserModel;

class ClientController extends BaseController
{
    public function index()
    {
        return view('client/Chambres');
    }
    public function mesReservations()
    {
        $clientId = session()->get('user_id');

        if (!$clientId) {
            return redirect()->to('/login');
        }

        $reservationModel = new ReservationModel();

        $reservations = $reservationModel->getReservationsByClient($clientId);

        return view('Client/MesReservation', ['reservations' => $reservations]);
    }



    public function profile()
    {
        $clientModel = new ClientModel();
        $client = $clientModel->where('user_id', session()->get('user_id'))->first();

        if (!$client) {
            return redirect()->to('/login')->with('error', 'Client introuvable.');
        }

        return view('Client/profile', ['client' => $client]);
    }

    public function updateProfile()
    {
        $rules=[
            'nom'=>'required|min_length[3]|max_length[20]',
            'prenom'=>'required|min_length[3]|max_length[20]',
            'adresse'=>'required|min_length[3]|max_length[255]',
            'telephone'=>'required|min_length[10]|max_length[20]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $clientModel = new ClientModel();
        $update = $clientModel->update(session()->get('user_id'), [
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'adresse' => $this->request->getPost('adresse'),
            'telephone' => $this->request->getPost('telephone'),
        ]);

        return redirect()->to('/client/profile')->with('seccuss','les inforamtions sont modifier avec succes');

    }





    public function deleteAccount()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/login')->with('error', 'Veuillez vous connecter pour continuer.');
        }

        $clientId = session()->get('user_id');
        $clientModel = new ClientModel();
        $usermodel = new UserModel();
        try {
            if ($clientModel->delete($clientId) && $usermodel->delete($clientId)) {
                session()->destroy();
                return redirect()->to('/')->with('success', 'Votre compte a été supprimé avec succès.');
            } else {
                return redirect()->back()->with('error', 'Impossible de supprimer votre compte. Veuillez réessayer.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }



}
