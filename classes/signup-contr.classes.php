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
      if ($this->emptyInput() == false) {
        // echo "Empty Input";
        header("location: ../index.php?error=emptyinput");
        exit();
      }

      if ($this->invalidEmail() == false) {
        // echo "Email is not valid";
        header("location: ../index.php?error=invalidemail");
        exit();
      }

      if ($this->passwordMatch() == false) {
        // echo "Password doesnt match";
        header("location: ../index.php?error=passwordmatch");
        exit();
      }

      if ($this->usernameTakenCheck() == false) {
        // echo "Username or Email exists";
        header("location: ../index.php?error=useroremailexists");
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