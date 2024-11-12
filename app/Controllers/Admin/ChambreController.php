<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ChambreModel;
use App\Models\ChambreTypeModel;

class ChambreController extends BaseController
{
    public function index()
    {
        $chambreModel = new ChambreModel();
        $data['chambres'] = $chambreModel->getWithType();
        return view('Admin/chambres/index', $data);
    }

    public function create()
    {
        $typeChambreModel = new ChambreTypeModel();
        $data['types_chambre'] = $typeChambreModel->findAll();
        return view('Admin/chambres/create', $data);
    }

    public function store()
    {


        $rules = [
            'numero' => 'required|integer',
            'prix' => 'required|decimal',
            'description' => 'permit_empty|string',
            'statut' => 'required|in_list[disponible,indisponible]',
            'type_chambre_id' => 'required|integer'
        ];
    
        if (!$this->validate($rules)) {
            // Affichez les erreurs de validation
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        if (($this->request->getMethod() === 'POST')) {
            $chambreModel = new ChambreModel();
            $data = [
                'numero' => $this->request->getPost('numero'),
                'prix' => $this->request->getPost('prix'),
                'description' => $this->request->getPost('description'),
                'statut' => $this->request->getPost('statut'),
                'type_chambre_id' => $this->request->getPost('type_chambre_id'),
            ];

            $chambreModel->save($data);
            return redirect()->to('/admin/chambres');
        }
    }

    public function edit($id)
    {
        $chambreModel = new ChambreModel();
        $typeChambreModel = new ChambreTypeModel();

        $data['chambre'] = $chambreModel->getChambreById($id);

        $data['types_chambre'] = $typeChambreModel->findAll();

        return view('Admin/chambres/edit', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'POST') {
            $chambreModel = new ChambreModel();

            $data = [
                'numero' => $this->request->getPost('numero'),
                'prix' => $this->request->getPost('prix'),
                'description' => $this->request->getPost('description'),
                'statut' => $this->request->getPost('statut'),
                'type_chambre_id' => $this->request->getPost('type_chambre_id'),
            ];

            $chambreModel->update($id, $data);
            return redirect()->to('/admin/chambres');
        }
    }

    public function delete($id)
    {
        $chambreModel = new ChambreModel();
        $chambreModel->delete($id);
        return redirect()->to('/admin/chambres');
    }
}

