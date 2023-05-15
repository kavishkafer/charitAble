<?php 
    class Donors extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
            $this->donorModel = $this->model('Donor');
        }

        public function list_of_donors(){
            // Get admin details
        $donor_details = $this->donorModel->getDonorDetails();

        $data = [
             'donor_details' => $donor_details
        ];

        $this->view('admin/list_of_donors',$data);
        }

        public function view_profile($id){
            // Get profile details
        $donor = $this->donorModel->getDonorById($id);
        
        $data = [
            'donor' => $donor,
       ];
        $this->view('admin/don_view_profile',$data);
    }
    }