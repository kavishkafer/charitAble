<?php 
    class Donors extends Controller {
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $this->donorModel = $this->model('Donor');
        }

        public function list_of_donors(){
            // Get admin details
        $donor_details = $this->donorModel->getDonorDetails();

        $data = [
             'donor_details' => $donor_details
        ];

        $this->view('donors/list_of_donors',$data);
        }
    }