<?php 
    class Donations extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
                $this->donationModel = $this->model('Donation');
        }

        public function list_of_donations(){
            $donation_details = $this->donationModel->getDonationDetails();
        $data = [
             'donation_details' => $donation_details
        ];
        $this->view('admin/list_of_donations',$data);
        }

    }