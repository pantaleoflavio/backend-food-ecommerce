<?php
class SignupContr extends Signup {

    private $fullname;
    private $email;
    private $username;
    private $user_image;
    private $password;
    private $confirmPassword;

    public function __construct($fullname, $email, $username, $user_image, $password, $confirmPassword)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->username = $username;
        $this->user_image = $user_image;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword; 
    }

    public function signupUser() {
        $errors = array();

        if ($this->emptyInput() == false) {
            $errors[] = "Empty input";
        }
    
        if ($this->invalidEmail() == false) {
            $errors[] = "Invalid email";
        }
    
        if ($this->passwordMatch() == false) {
            $errors[] = "Passwords don't match";
        }
    
        if ($this->usernameTakenCheck() == false) {
            $errors[] = "Username or email already exists";
        }
    
        if (!empty($errors)) {
            // Ci sono errori, reindirizza con gli errori come parametro
            $errorString = implode(", ", $errors);
            header("location: ../auth/register.php?error=" . urlencode($errorString));
            exit();
        }

      $this->setUser($this->fullname, $this->email, $this->username, $this->user_image, $this->password);
    }

    private function emptyInput() {
        $result;
        if (empty($this->fullname) || empty($this->email) || empty($this->username) || empty($this->password) || empty($this->confirmPassword)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch() {
        $result;
        if ($this->password !== $this->confirmPassword) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function usernameTakenCheck() {
        $result;
        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidPass() {

    }
}
?>