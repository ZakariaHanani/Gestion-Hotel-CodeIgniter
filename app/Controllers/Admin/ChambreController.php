<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\ChambreModel;
use App\Models\ChambreTypeModel;
use App\Models\ImageModel ;

class ChambreController extends BaseController
{
    public function index()
    {
        $chambreModel = new ChambreModel();
        $data['chambres'] = $chambreModel->getWithType();
        foreach($data['chambres'] as &$chambre){
           $chambre['images'] = $chambreModel->getImages($chambre['id']);
        }
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
            'statut' => 'required|in_list[disponible,occupe]',
            'type_chambre_id' => 'required|integer'
        ];
    
        if (!$this->validate($rules)) {
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
            $id =$chambreModel->getInsertID();
            $this->uploadImages($id);

            return redirect()->to('/admin/chambres');
        }
    }

    public function edit($id)
{
    $chambreModel = new ChambreModel();
    $imageModel = new ImageModel();
    $typeChambreModel = new ChambreTypeModel();

    // Fetch the room details
    $data['chambre'] = $chambreModel->find($id);

    // Fetch room types for the dropdown
    $data['types_chambre'] = $typeChambreModel->findAll();

    // Fetch associated images
    $data['images'] = $imageModel->where('chambre_id', $id)->findAll();

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

        $this->uploadImages($id);

        return redirect()->to('/admin/chambres')->with('message', 'Room updated successfully');
    }
}


    public function delete($id)
    {
        $chambreModel = new ChambreModel();
        $imageModel =new ImageModel();
        $chambreModel->delete($id);
        $imageModel->deleteImagesByChambreId($id);
        return redirect()->to('/admin/chambres');
    }

    public function uploadImages($chambreId)
{
    $files = $this->request->getFiles();
    foreach ($files['images'] as $file) {
        if ($file->isValid()) {
            $newName = $file->getRandomName();
            $file->move('uploads/chambres', $newName);

            $db = \Config\Database::connect();
            $builder = $db->table('images');
            $builder->insert([
                'chambre_id' => $chambreId,
                'image_path' => 'uploads/chambres/' . $newName,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    return redirect()->back()->with('message', 'Images uploaded successfully');
}

}

