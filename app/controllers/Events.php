<?php 
    class Events extends Controller {
        public function __construct(){
            // if(!isLoggedIn()){
            //     redirect('users/login');
            // }
                $this->eventModel = $this->model('Event');
        }

        public function list_of_events(){
            $event_details = $this->eventModel->getEventDetails();
        $data = [
             'event_details' => $event_details
        ];
        $this->view('admin/list_of_events',$data);
        }
    }