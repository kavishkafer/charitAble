<?php 
class reports extends Controller{
 public function __construct(){
    $this->reportModel=$this->model('report');
    
 }
 public function index(){

  $this->view('admin/reportsView');
 }

}