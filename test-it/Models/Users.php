<?php
    //get database file info
    include_once 'Services/dbh.inc.php';

    //set conn global to be able to get access in class

    class Users
    {
        private $name;
        private $password;

        public function __construct(){ }

        //getters and setter (not useful for now)
        public function getName(){ return $this->name; }

        public function setName($name){ $this->name = $name; }

        public function getPassword(){ return $this->password; }

        public function setPassword($password){ $this->name = $password; }

        //fetch database with sent user name
        public function getSingleUser($username){
            global $conn;
            $sql = "SELECT * FROM  users WHERE name = '" . $username . "';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            //return array with user found and password
            if($resultCheck > 0){
                $row   = mysqli_fetch_row($result);
                return $row;
            }  

            //return -1 for no data found
            else{
                return -1;
            }
        }
    }
?>