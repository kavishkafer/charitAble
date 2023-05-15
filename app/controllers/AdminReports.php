<?php 
    class AdminReports extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
        }

        public function index(){
        
            $this->view('admin/admin_reports');
        }

    }