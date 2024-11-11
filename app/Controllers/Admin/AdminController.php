<?php 
namespace App\Controllers\Admin;

use App\Controllers ;
use App\Controllers\BaseController;
use App\Models\ReservationModel;

class AdminController extends BaseController {
    
        public function dashboard(){
                $model =model('ReservationModel') ;
                $data = $model->countAllResults();
                        
                
        } 

}




?>