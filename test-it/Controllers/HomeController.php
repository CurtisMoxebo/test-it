<?php
    //get controller library
    require_once 'libs/Controller.php';

    //check if session is started
    if (!isset($_SESSION)) { session_start(); }

    class HomeController extends Controller
    {
        //default action
        public function index($id){
            //check if user name is set
            if(!isset($_SESSION['userName'])){
                header('Location: ' . '/');
                exit(); 
            }

            //render index view with assigned data
            $this->view->message = "Home controller from index action " . $id;
            $this->view->render('views/Home/index.php');
        }
    }
?>