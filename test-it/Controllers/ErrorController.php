<?php
    //get controller library
    require_once 'libs/Controller.php';

    class ErrorController extends Controller
    {
        //throw the 404 page
        public function index(){
            $this->view->render('views/error/index.php');
        }

        //throw database not connected page
        public function dbError(){
            $this->view->render('views/error/dbError.php');
        }
    }
?>