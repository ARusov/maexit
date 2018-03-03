<?php
include('password.php');

class User extends Password
{

    public $_dbh;

    private function get_user_hash($username)
    {

        try {

//            $host_name = 'localhost';
//            $database = 'maexit';
//            $user_name = 'root';
//            $password = '';


            $host_name = 'db721794461.db.1and1.com';
            $database = 'db721794461';
            $user_name = 'dbo721794461';
            $password = '9on2e1U4lH06K73v';


            $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);

            $stmt = $dbh->prepare('SELECT password, email, id FROM  mx_company_user WHERE email = :username');
            $stmt->execute(array('username' => $username));

            return $stmt->fetch();

        } catch (PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }

    public function isValidUsername($username)
    {
        if (strlen($username) < 3) return false;
        return true;
    }

    public function login($username, $password)
    {
        if (!$this->isValidUsername($username)) return false;
        if (strlen($password) < 3) return false;

        $row = $this->get_user_hash($username);

        if ($this->password_verify($password, $row['password']) == 1) {

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['userID'] = $row['id'];
            $this->_id = $row['id'];
            return true;
        }
    }

    public function logout()
    {
        session_destroy();
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            return true;
        }
    }
}


?>
