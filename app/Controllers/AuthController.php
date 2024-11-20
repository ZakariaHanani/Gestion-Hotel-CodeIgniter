<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientModel;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function store()
    {
        $usermodel = new UserModel();
        $clientmodel = new ClientModel();
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
            return view('auth/register', $data);
        }

        if ($usermodel->save([
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role' => 'client',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ])) {
            $user_id = $usermodel->getInsertID();
            log_message('debug', 'ID utilisateur : ' . $user_id);

            if (!$user_id) {
                return redirect()->back()->with('error', 'Erreur d\'insertion dans la table users.');
            }

            if ($clientmodel->insert([
                'user_id' => $user_id,
                'nom' => $this->request->getPost('nom'),
                'prenom' => $this->request->getPost('prenom'),
                'telephone' => $this->request->getPost('telephone'),
                'adresse' => $this->request->getPost('adresse'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ])) {
                return redirect()->to('/login')->with('success', 'Inscription réussie !');
            } else {
                log_message('error', 'Erreur lors de l\'insertion dans la table clients.');
                return redirect()->back()->with('error', 'Erreur d\'insertion dans la table clients.');
            }
        } else {
            log_message('error', 'Erreur lors de l\'insertion dans la table users.');
            return redirect()->back()->with('error', 'Erreur d\'insertion dans la table users.');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function verify_login()
    {
        $data = [];
        $usermodel = new UserModel();

        // Validation des règles
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {

            $data['validation'] = $this->validator;
            return view('auth/login', $data);
        }


        $user = $usermodel->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set([
                'email'     => $user['email'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);


            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/')->with('success', 'Bienvenue, administrateur !');
            } else {
                return redirect()->to('/')->with('success', 'Connexion réussie !');
            }
        } else {
            $data['error'] = 'Adresse e-mail ou mot de passe incorrect !';
            return view('auth/login', $data);
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Déconnexion réussie !');
    }
}
