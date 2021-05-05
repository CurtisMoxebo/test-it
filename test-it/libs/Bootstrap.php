<?php     
    class Bootstrap
    {
        public function __construct(){
            //router
            $tokens = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));

            //dispatcher  
            //check if url has no controller and send to default controller (IndexController)
            if(!array_key_exists(1,$tokens)){
                require_once('Controllers/IndexController.php');
                $controllerName = 'IndexController';
                $controller = new $controllerName;
                $controller->index("");
            }

            //check if controller file for the 1st parameter in url exists
            else if(file_exists('Controllers/'.$tokens[1].'Controller.php')){
                $controllerName = ucfirst($tokens[1])."Controller";
                require_once('Controllers/'.$controllerName.'.php');
                $controller = new $controllerName;

                //check if no action is passed and redirect to default action (index)
                if(!array_key_exists(2,$tokens)){
                    $controller->index("");
                }       
                
                //proceed if action if set
                else{
                    $actionName = $tokens[2];

                    //check if the action does not exist in the controller and throw 404
                    if (!method_exists($controller, $actionName)){
                        require_once('Controllers/ErrorController.php');
                        $controller = new ErrorController;
                        $controller->index();
                    }

                    //check if there is a parameter set to the action
                    else if(!array_key_exists(3,$tokens)){
                        $controller->$actionName("");
                    }

                    //go to action with passed parameter
                    else{
                        $parameter = $tokens[3];
                        $controller->$actionName($parameter);
                    }
                }
            }

            //send 404 page if controller does not exist
            else{
                require_once('Controllers/ErrorController.php');
                $controller = new ErrorController;
                $controller->index();
            }
        }
    }
?>