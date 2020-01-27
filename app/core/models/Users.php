<?php
class Users extends QueryBuilder
{
    //public $table;
    // public $col_name = [];
    // public $col_values = [];
    public function __construct($pdo)

    {
        parent::__construct($pdo);
        $this->table = 'user';
        $this->col_name = array('id','provider', 'provider_id', 'name', 'email', 'password', 'user_type',  'hash');
        $this->values = array('email');
        // $this->param_values = [];
    }

    public function listUsers()
    {
        return parent::list($this->table, $this->col_name);
    }


    public function insertUsers($name, $email, $password)
    {
        // $name = trim($_POST['name']);
        // $email = trim($_POST['email']);
        // $password = $_POST['password'];
        $secured_pass = password_hash($password, PASSWORD_BCRYPT);
        $credentials = [];
        $credentials[0] = "'" . trim($_POST['name']) . "'";
        $credentials[1] = "'" . trim($_POST['email']) . "'";
        $credentials[2] = "'" . $secured_pass . "'";
        $credentials[3] = "'" . "reader" . "'";
        $verify_password =  $_POST['verify_password'];
        $select = parent::select($this->table, $this->col_name, $this->values, $email);
        $select->execute();
        if ($select->rowcount() == 0) {
            if ($password != $verify_password) {
                echo 'Password do not match';
            } else {
                $hash = md5(rand(0, 1000));
                $credentials[4] = "'" . $hash . "'";
                array_shift($this->col_name);
                array_shift($this->col_name);
                array_shift($this->col_name);
                $insert = parent::insert($this->table, $this->col_name, $credentials);
                $insert->execute();
                echo 'You have signed up successfully';
            }
        } else {
            echo "Email Id already exists. Please use different Email Id";
        }
    }


    public function verifyUser($email)
    {
        // $email = $password = "";
        $email_err = $password_err = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty(trim($_POST["email"]))) {
                $email_err = "Please enter email";
            } else {
                $email = trim($_POST["email"]);
            }
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password";
            } else {
                $password = $_POST["password"];
            }
            if (empty($email_err) && empty($password_err)) {
                $select = parent::select($this->table, $this->col_name, $this->values, $email);
                if ($select->execute()) {
                    if ($select->rowcount() == 1) {
                        if ($row = $select->fetch()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $hashed_password = $row['password'];
                            $user_type = $row['user_type'];
                            if (password_verify($password, $hashed_password)) {
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION['id'] = $id;
                                $_SESSION["name"] = $name;
                                $_SESSION["email"] = $email;
                                $_SESSION["user_type"] = $user_type;
                                echo "you have successfully logged in";
                            } else {
                                echo "The password you entered was not valid";
                            }
                        }
                    } else {
                        echo "No account found with that email";
                    }
                } else {
                    echo "oops! something went wrong";
                }
            }
        }
    }
    // public function googleLogin($provider)
    // {
    //      $select = parent::select($this->table,$this->col_name,$this->values, $provider);
    //      if ($select->execute()) {
    //          if ($select->rowcount() > 0) {
                 
    //          }
    //      } else {
    //          echo 'something went wrong';
    //      }
         
    // }
}
