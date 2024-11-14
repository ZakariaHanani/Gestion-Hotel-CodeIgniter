<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ReservationModel;
use App\Models\ChambreModel;
use App\Models\ClientModel;
use App\Models\UserModel;

class AdminController extends BaseController {
    
        public function dashboard(){

        $chambreModel = new ChambreModel();
        $reservationModel = new ReservationModel();
        $clientModel = new ClientModel();

        $data = [
            'totalChambres' => $chambreModel->countAll(), 
            'totalReservations' => $reservationModel->countAll(), 
            'totalClients' => $clientModel->countAll(), 
            'reservationsRecents' => $reservationModel->orderBy('created_at', 'desc')->findAll(5), 
        ];

        return view('admin/dashboard', $data);
        }

        public function profile($adminId = 1)
    {
        $adminModel =new AdminModel();
        $data['admin'] = $adminModel->getAdminProfile($adminId);
        return view('admin/profile', $data);
    }
                
        } 






?>