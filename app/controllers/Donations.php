<?php 
    class Donations extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
                $this->donationModel = $this->model('Donation');
        }

        public function list_of_pending_donations(){
            $donation_details = $this->donationModel->getPendingDonationDetails();
        $data = [
             'donation_details' => $donation_details
        ];
        $this->view('admin/list_of_pending_donations',$data);
        }

        public function list_of_completed_donations(){
            $donation_details = $this->donationModel->getCompletedDonationDetails();
        $data = [
             'donation_details' => $donation_details
        ];
        $this->view('admin/list_of_completed_donations',$data);
        }

        public function list_of_expired_donations(){
            $donation_details = $this->donationModel->getExpiredDonationDetails();
        $data = [
             'donation_details' => $donation_details
        ];
        $this->view('admin/list_of_expired_donations',$data);
        }

    }