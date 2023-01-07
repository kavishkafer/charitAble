<?php
//Base controller this loads the model and views

class Controller{
    //load model
    public function model($model){
        //require model file
        require_once '../app/models/' . $model . '.php';

        //instantiate model
        return new $model();


    }

    //Load iew

    public function view($view, $data = []){
        //check for the view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            //view does not exist
            die('View does not exist');
        }
    }
}