<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\ReservationModel;
use App\Models\ChambreModel;
use App\Models\ClientModel;
use App\Models\RapportModel ;

class AdminController extends BaseController {

    protected $clientModel;
    protected $chambreModel;
    protected $reservationModel;
    protected $reportModel;

    public function __construct()
    {
        $this->clientModel = new ClientModel();
        $this->chambreModel = new ChambreModel();
        $this->reservationModel = new ReservationModel();
        $this->reportModel = new RapportModel(); 
    }
    
        public function dashboard(){

        
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $reservationData = $this->getMonthlyReservationData();
        $data = [
            'months' => $months,
            'reservationData' => $reservationData,
            'totalChambres' => $this->chambreModel->countAllResults(), 
            'disponibleChambres'=>$this->chambreModel->where('statut' ,'disponible')->countAllResults(),
            'totalReservations' => $this->reservationModel->countAllResults(), 
            'totalClients' => $this->clientModel->countAllResults(), 
            'activeReservations' => $this->reservationModel->where('statut !=','terminée')->countAllResults(),
        ];
        return view('admin/dashboard', $data);
        }
        private function getMonthlyReservationData()
        {
            $data = [];
            for ($i = 1; $i <= 12; $i++) {
                $data[] = $this->reservationModel
                    ->where('MONTH(date_debut)', $i)
                    ->countAllResults(); 
            }
            return $data;
        }

        public function profile($adminId = 1)
    {
        $adminModel =new AdminModel();
        $data['admin'] = $adminModel->getAdminProfile($adminId);
        return view('admin/profile', $data);
    }



    public function search()
{
    $query = $this->request->getGet('query');

    $data = [
        'clients' => $this->clientModel->like('nom', $query)->findAll(),
        'chambres' => $this->chambreModel->like('numero', $query)->getWithType(),
        'query' => $query,
    ];

    return view('admin/search_results', $data);
}

                


} 


?>