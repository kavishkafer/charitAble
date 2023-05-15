<?php 
    class AdminReports extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }

            $this->reportModel = $this->model('report');
        }

        public function index(){
        
            $this->view('admin/admin_reports');
        }

        public function pendingDonations(){
            $this->view('admin/pending_donations');
        }
        public function completedDonations(){
            $this->view('admin/completed_donations');
        }
        
        public function pendingEvents(){
            $this->view('admin/pending_events');
        }
        public function completedEvents(){
            $this->view('admin/completed_events');
        }

        // public function donationsComparison(){
        //     $childrenHomeCount = $this->reportModel->getDonationDetailsByType('Children Home');
        //     $elderHomeCount = $this->reportModel->getDonationDetailsByType('Elder Home');
        //     $disabledInstituteCount = $this->reportModel->getDonationDetailsByType('Disabled Institute');
        //     $otherCount = $this->reportModel->getDonationDetailsByType('Other');

        //     $data = [
        //         'children_home_count' => $childrenHomeCount ,
        //         'elder_home_count' => $elderHomeCount,
        //         'disabled_institute_count' => $disabledInstituteCount,
        //         'other_count' => $otherCount,
        //         'CH' => 'Children Home',
        //         'EH' => 'Elder Home',
        //         'DI' => 'Disabled Institute',
        //         'Other' => 'Others'
        //    ];
        //     $this->view('admin/donations_comparison',$data);
        // }

        public function donationsComparison(){
            $this->view('admin/donations_comparison');
        }

        public function eventsComparison(){
            $this->view('admin/events_comparison');
        }
        

        // public function eventsComparison(){
        //     $childrenHomeCount = $this->reportModel->getEventDetailsByType('Children Home');
        //     $elderHomeCount = $this->reportModel->getEventDetailsByType('Elder Home');
        //     $disabledInstituteCount = $this->reportModel->getEventDetailsByType('Disabled Institute');
        //     $otherCount = $this->reportModel->getEventDetailsByType('Other');

        //     $data = [
        //         'children_home_count' => $childrenHomeCount ,
        //         'elder_home_count' => $elderHomeCount,
        //         'disabled_institute_count' => $disabledInstituteCount,
        //         'other_count' => $otherCount,
        //         'CH' => 'Children Home',
        //         'EH' => 'Elder Home',
        //         'DI' => 'Disabled Institute',
        //         'Other' => 'Others'
        //    ];
        //     $this->view('admin/events_comparison',$data);
        //     ;
        // }

    }