<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ChambreTypeModel;

class ChambreTypeController extends BaseController
{
    protected $chambreTypeModel;

    public function __construct()
    {
        $this->chambreTypeModel = new ChambreTypeModel();
    }

    public function index()
    {
        $types = $this->chambreTypeModel->findAll();
        return view('admin/type_chambre/index', ['types' => $types]);
    }

    public function create()
    {
        return view('admin/type_chambre/create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        if (!$this->chambreTypeModel->insert($data)) {
            return redirect()->back()->with('errors', $this->chambreTypeModel->errors())->withInput();
        }
        return redirect()->to('/admin/chambre_type')->with('success', 'Type de chambre créé avec succès.');
    }

    public function edit($id)
    {
        $type = $this->chambreTypeModel->find($id);
        return view('admin/type_chambre/edit', ['type' => $type]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        if (!$this->chambreTypeModel->update($id, $data)) {
            return redirect()->back()->with('errors', $this->chambreTypeModel->errors())->withInput();
        }
        return redirect()->to('/admin/chambre_type')->with('success', 'Type de chambre mis à jour avec succès.');
    }

    public function delete($id)
    {
        $this->chambreTypeModel->delete($id);
        return redirect()->to('/admin/chambre_type')->with('success', 'Type de chambre supprimé avec succès.');
    }
}
