<?php
    //get user's model and controller library
    require_once 'libs/Controller.php';
    require_once 'Models/Users.php';

    //check if session is started
    if (!isset($_SESSION)) { session_start(); }

    class IndexController extends Controller
    {
        //default action
        public function index($id){
            $userName = $password = '';
            $userName_feedback = $password_feedback = '';
            $inputCheckState = true;

            //redirect user to home page if he is already logged in
            if(isset($_SESSION["userName"])){
                header('Location: ' . '/Home');
                exit(); 
            }

            //Check if data has been posted and session variables have not been set
            if($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION["userName"])){
                $userName = $_POST['userName'];
                $password = $_POST['password'];

                //check if name is empty
                if($userName == ''){
                    $userName_feedback = '*The user name is empty';
                    $inputCheckState = false;
                }
                
                //check if password is empty
                if($password == ''){
                    $password_feedback = '*The password is empty';
                    $inputCheckState = false;
                }

                //check if password has less than 4 characters
                else if(strlen($password) < 8){
                    $password_feedback = '*Your password must have atleast 8 characters';
                    $inputCheckState = false;
                }

                //proceed to database verification if input is alright
                if($inputCheckState){
                    $user = new Users();                   
                    $userResult = $user->getSingleUser($userName);

                    //when no user has been found
                    if($userResult === -1){
                        $userName_feedback = "This user does not exist!";
                    }

                    else{
                        //if passwords do not match
                        if($userResult[1] !== md5($password)){
                            $password_feedback = "Passwords do not match!";
                        }
                        else{
                            $_SESSION['userName'] = $userName;

                            //get last login date and set current login date
                            if(isset($_SESSION['currentLogin'])){
                                $_SESSION['lastLogin'] = $_SESSION['currentLogin'];
                            }
                            else{
                                $_SESSION['lastLogin'] = "Never";
                            }
                            $_SESSION['currentLogin'] = date('F j, Y, g:i a');

                            header('Location: ' . '/Home');
                            exit(); 
                        }
                    }
                }
            }

            //render index view with assigned data
            $this->view->userName = $userName;
            $this->view->userName_feedback = $userName_feedback;
            $this->view->password_feedback = $password_feedback;
            $this->view->render('views/Index/index.php');
        }

        //logout action : to unset session variable and redirect to main page 
        public function logout($id){
            if(isset($_SESSION["userName"])) { unset($_SESSION["userName"]); }
            
            if(isset($_SESSION["lastLogin"])) { unset($_SESSION["lastLogin"]); }
            
            //go back to main page
            header('Location: ' . '/');
            exit(); 
        }
    }
?>