<?php    

    public function login(){
        try {

            $stm =  $this->con->prepare("SELECT * FROM `users` where (user = :user Or email = :user) AND password = :password");
            // Here {:user} is user's given data through {name="user"} filed
            // Hence value of {:user} must match with "user column" or "password column" to Login.

            $stm->bindValue(':user', $this->user, PDO::PARAM_STR);
            $stm->bindValue(':password', $this->password, PDO::PARAM_STR);
            $stm->execute();

            return $stm->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    // Method: Login with user name or email address
