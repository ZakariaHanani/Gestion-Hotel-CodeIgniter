<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\ClientModel;
use App\Models\ReservationModel;
use app\Models\UserModel ;

class ClientController extends BaseController
{
    protected $clientModel;
    protected $reservationModel ;
    protected $usermodel ;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
        $this->reservationModel =new ReservationModel();
        $this->usermodel =new UserModel();
    }

    // Affiche la liste des clients
    public function index()
    {
        $clients = $this->clientModel->findAll();
        foreach($clients as &$client){
            $client['nombre_reseravtions'] = $this->reservationModel->countReservationsByClient($client['user_id']);
                }
        return view('admin/clients/index', ['clients'=>$clients]);
    }

    // Affiche le profil d'un client
    public function show($clientId)
    {
       
        $data['client'] =$this->clientModel->getClientProfile($clientId) ;
        return view('admin/clients/show', $data);
    }

    // Affiche le formulaire d'ajout de client
    public function create()
    {
        return view('admin/clients/create');
    }

    // Enregistre un nouveau client
    public function store()
    {
        
        $data = $this->request->getPost();

        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|min_length[6]|matches[password]',
            'nom' => 'required|min_length[2]',
            'prenom' => 'required|min_length[2]',
            'telephone' => 'required|min_length[10]|max_length[15]',
            'adresse' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('admin/clients/create', $data);
        }


        if ($this->usermodel->save([
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => 'client',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ])) {
            $user_id = $this->usermodel->getInsertID();
            log_message('debug', 'ID utilisateur : ' . $user_id);

            if (!$user_id) {
                log_message('error', 'User ID retrieval failed.');
                return redirect()->back()->with('error', 'Erreur lors de l\'insertion dans la table users. ID non récupéré');
            }

            if ($this->clientModel->insert([
                'user_id' => $user_id,
                'nom' => $this->request->getPost('nom'),
                'prenom' => $this->request->getPost('prenom'),
                'telephone' => $this->request->getPost('telephone'),
                'adresse' => $this->request->getPost('adresse'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ])) {
                return redirect()->to('/admin/clients') ;
        } else {
            log_message('error', 'Erreur lors de l\'insertion dans la table clients: ' . json_encode($this->clientModel->errors()));
            return redirect()->back()->with('error', 'Erreur d\'insertion dans la table clients.');
        }
    } else {
        log_message('error', 'Erreur lors de l\'insertion dans la table users: ' . json_encode($this->usermodel->errors()));
        return redirect()->back()->with('error', 'Erreur d\'insertion dans la table users.');
    }
        
    }

    public function edit($clientId)
    {
        $data['client'] = $this->clientModel->find($clientId);
        return view('admin/clients/edit', $data);
    }

    public function update($clientId)
    {
        $this->clientModel->update($clientId, [
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'telephone' => $this->request->getPost('telephone'),
            'adresse' => $this->request->getPost('adresse'),
        ]);
        return redirect()->to('/admin/clients')->with('message', 'Client mis à jour avec succès');
    }
    
    public function delete($clientId)
    {
        $this->clientModel->delete($clientId);
        $this->usermodel->delete($clientId);
        return redirect()->to('/admin/clients')->with('message', 'Client supprimé avec succès');
    }
}
