<?php 
    class Donors extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
            $this->donorModel = $this->model('Donor');
            $this->userModel = $this->model('User');
        }

        public function list_of_donors(){
            // Get admin details
        $donor_details = $this->donorModel->getDonorDetails();

        $data = [
             'donor_details' => $donor_details
        ];

        $this->view('admin/list_of_donors',$data);
        }

        public function addNewDonor(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $role = 2;

                $data = [
                    'D_Name' => trim($_POST['D_Name']),
                    'D_Email' => trim($_POST['D_Email']),
                    'D_Password' => trim($_POST['D_Password']),
                    'D_Tel_No' => trim($_POST['D_Tel_No']),
                    'D_Address' =>trim($_POST['D_Address']),
                    'user_role' => $role,
                    'D_Name_err' => '',
                    'D_Email_err' => '',
                    'D_Address_err' => '',
                    'D_Tel_No_err' => '',
                    'D_Password_err' => '',
                    'D_Tel_No_err' => ''
                ];
                 

                // Validate data
                if(empty($data['D_Name'])){
                    $data['D_Name_err'] = 'Please enter name';
                } 
 
                if(empty($data['D_Email'])){
                    $data['D_Email_err'] = 'Please enter email';
                } 

                if(empty($data['D_Address'])){
                    $data['D_Address_err'] = 'Please enter address';
                } 


                if(empty($data['D_Tel_No'])){
                    $data['D_Tel_No_err'] = 'Please enter phone number';
                } else if (strlen($data['D_Tel_No']) != 10){
                    $data['D_Tel_No_err'] = 'Insert valid phone number';
                }

                if(empty($data['D_Password'])){
                    $data['D_Password_err'] = 'Please enter password';
                }  else if(strlen($data['D_Password']) < 6){
                    $data['D_Password_err'] = 'Password must be at least 6 characters';

                }

                //Validate Confirm Password
                if(empty($data['D_Confirm_Password'])){
                $data['D_Confirm_Password_err'] = 'Please confirm password';
                } else 
                {
                if($data['D_Password'] != $data['D_Confirm_Password']){
                    $data['D_Confirm_Password_err'] = 'Passwords do not match';
                }
            }
            

                // make sure no errors
                if(empty($data['D_Name_err']) && empty($data['D_Password_err']) &&
                empty($data['D_Email_err']) && empty($data['D_Tel_No_err']) && empty($data['D_Confirm_Password_err']) && empty($data['D_Address_err']) ){
                    // Validated
                    // Hash Password
                    $data['D_Password'] = password_hash($data['D_Password'], PASSWORD_DEFAULT);

                    if($this->userModel->addDonor($data)){
                        // flash('register_success', 'You are registered and can log in');
                        $x=$this->userModel->getDonorUserId($data['D_Email']);
                        $this->donorModel->addDonorDetails($data,$x);

                        redirect('admin/list_of_donors');

                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('admin/add_new_donor', $data);
                }

            } else {
                // Init data
                $data = [
                'D_Name' => '',
                'D_Email' => '',
                'D_Address' => '',
                'D_Tel_No' => '',
                'D_Password' => '',
                'D_Confirm_Password' => '',
                'D_Name_err' => '',
                'D_Email_err' => '',
                'D_Address_err' => '',
                'D_Tel_No_err' => '',
                'D_Password_err' => '',
                'D_Confirm_Password_err' => ''
            ];

            $this->view('admin/add_new_donor', $data);
        }
    }

    


        public function view_profile($id){
            // Get profile details
        $donor = $this->donorModel->getDonorById($id);
        $pending_donation_count = $this->donorModel->getPendingDonationCount($id);
        $completed_donation_count = $this->donorModel->getCompletedDonationCount($id);
        $expired_donation_count = $this->donorModel->getExpiredDonationCount($id);
        
        $data = [
            'donor' => $donor,
            'pending_donation_count' => $pending_donation_count,
            'completed_donation_count' => $completed_donation_count,
            'expired_donation_count' => $expired_donation_count
       ];
        $this->view('admin/don_view_profile',$data);
    }
    }