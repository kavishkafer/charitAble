<?php 
    class Beneficiaries extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
            $this->beneficiaryModel = $this->model('Beneficiary');
        }

        public function registration_requests(){
            $reg_bens = $this->beneficiaryModel->getRegBenDetails();
            $data = [
                'reg_bens' => $reg_bens
            ];
            $this->view('admin/ben_registration_requests',$data);
        }

        public function view_request($id){
            // Get profile details
            $beneficiary = $this->beneficiaryModel->getBeneficiaryById($id);
            $data = [
                'beneficiary' => $beneficiary,
            ];
            $this->view('admin/ben_view_request',$data);
            }

        public function approve_request($id){
            $this->beneficiaryModel->approveRequest($id);
            $beneficiary_details = $this->beneficiaryModel->getBeneficiaryDetails();
            $data = [
                'beneficiary_details' => $beneficiary_details
            ];
            $this->view('admin/list_of_beneficiaries',$data);
        }

        public function deny_request($id){
            $this->beneficiaryModel->denyRequest($id);
            $reg_bens = $this->beneficiaryModel->getRegBenDetails();
            $data = [
                'reg_bens' => $reg_bens
            ];
            $this->view('admin/ben_registration_requests',$data);
        }

        public function list_of_beneficiaries(){
            // Get admin details
        $beneficiary_details = $this->beneficiaryModel->getBeneficiaryDetails();
        $data = [
             'beneficiary_details' => $beneficiary_details
        ];
        $this->view('admin/list_of_beneficiaries',$data);
        }

        public function view_profile($id){
                // Get profile details
            $beneficiary = $this->beneficiaryModel->getBeneficiaryById($id);
            $data = [
                'beneficiary' => $beneficiary,
           ];
            $this->view('admin/ben_view_profile',$data);
        }
    }