<?php
include('dao.php');
class RegistrationHandler{

    private $postData, $dao, $fName, $lName, $email,$password, $password2;

    public function __construct(array $postData = null)
    {
        $this->dao = new dao();
        if($postData)
        {
            $this->postData = $postData;
            $this->fName=trim($postData["fName"]);
            $this->lName=trim($postData["lName"]);
            $this->email=trim($postData["email"]);
            $this->password= $this->encryptPassword($postData["password1"], $postData["email"]);
            $this->password2= $this->encryptPassword($postData["password2"], $postData["email"]);
            $this->hear_about_us= $postData["hear_about_us"];
        }
    }

    /**
     * Checks if all the required fields are complete and returns true if they are.
     * @return mixed|string
     */
    public function register()
    {
        if((!$this->fName)||(!$this->lName)||(!$this->email)||(!$this->password)||(!$this->password2))//||(!$this->captchaEntry))
            return "Must complete all fields";
        else if($this->password!=$this->password2)//||(!$this->captchaEntry))
            return "Passwords fields must be the same";
        else if($this->hear_about_us=="not_selected")
            return "Please tell us how you heard about us";

        else
        {
            $message = $this->processRegistration();
            if($message == "already_registered")
            {
                return $message;
            }
            else if($message == "registration_successful") return  "success";
            else  if($message == "registration_failed") return  "registration_failed";
            else  if($message == "no_device") return  "no_device";
        }
        return false;
    }

    public function deregisterAccount($userId, $email, $reason)
    {
        if($this->saveDeregisteredEmail($email, $reason))
            return $this->dao->deleteUserWEmailUserId($email, $userId);
    }

    public function saveDeregisteredEmail($email, $reason){
        return $this->dao->saveDeregisteredUser($email, $reason);
    }

    public function verify($email)
    {
        $this->dao->verifyEmailAddress($email);
    }

    /**
     * Returns true if the user is registered.
     * @return mixed
     */
    private function processRegistration()
    {
        $userCredentials=  $this->dao->getUserCredentials($this->email);
        if($userCredentials['password']) return "already_registered";
        else if ($this->dao->insertUserRegistrationData($this->fName, $this->lName, $this->email, $this->password, NULL, $this->hear_about_us))
        {
            if($this->dao->getUserCredentials($this->email)) return "registration_successful";
            else return "no_device";
        }
        else return "registration_failed";
    }

    /**
     * Returns true if the user is registered.
     * @return mixed
     */
    private function processEditProfile()
    {
        $userCredentials=  $this->dao->getUserCredentials($this->email);
        return $this->dao->insertUserRegistrationData($this->fName, $this->lName, $this->email, $this->password, $_SESSION['user_id']);
    }

    /**
     * Checks if all the required fields are complete and returns true if they are.
     * @return mixed|string
     */
    public function editProfile()
    {
        //If any fields are empty
        if((!$this->fName)||(!$this->lName)||(!$this->email))
        return "Must complete all fields";

        //If password field has been entered
        else if($this->password)
        {
            //If password fields are not the same
            if($this->password!=$this->password2)
            return "Passwords fields must be the same";
            else if ($this->processEditProfile()) return  "Profile successfully updated";
            return false;
        }

        else if ($this->processEditProfile()) return  "Profile successfully updated";
        return false;
    }

    /**
     * Checks if all the required fields are complete and returns true if they are.
     * @return mixed|string
     */
    public function updatePassword($userId, $authToken)
    {
        if($this->password)
        {
            //If password fields are not the same
            if($this->password!=$this->password2)
                return false;
            else return  $this->dao->updatePassword($this->password, $userId, $authToken);
        }
    }

    /**
     * Retrieves user profile data
     * @return bool|string
     */
    public function getUserProfileData()
    {
        return $this->dao->getUserProfileDataById($_SESSION['user_id']);
    }

    /**
     * Returns an encrypted password.
     * @param $password
     * @param $email
     * @return string
     */
    private function encryptPassword($password, $email)
    {
        return crypt ($password, $email);
    }

}
?>
