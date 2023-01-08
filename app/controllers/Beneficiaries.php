<?php 
    class Beneficiaries extends Controller {
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }
            $this->beneficiaryModel = $this->model('Beneficiary');
        }

        public function registration_requests(){
            $this->view('beneficiaries/registration_requests');
        }

        public function list_of_beneficiaries(){
            // Get admin details
        $beneficiary_details = $this->beneficiaryModel->getBeneficiaryDetails();

        $data = [
             'beneficiary_details' => $beneficiary_details
        ];

        $this->view('beneficiaries/list_of_beneficiaries',$data);
        }
    }