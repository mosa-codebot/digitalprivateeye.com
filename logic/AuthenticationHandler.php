<?php
session_start();
include('dao.php');

class AuthenticationHandler{

    private $postData, $email, $password, $dao, $apiKey;

    public function __construct(array $postData)
    {
        $this->dao = new dao();
        $this->postData = $postData;
        $this->email=  trim($postData["email"]);
        $this->password= $this->encryptPassword($postData["password"], $postData["email"]);
        $this->apiKey = "TrustIssuesUnresolvedFeelings";
    }

    /**
     * Begins performing a user authentication
     * @return string
     */
    public function signIn()
    {
        if((!$this->email)||(!$this->password))//||(!$this->captchaEntry))
            return "Must complete all fields";
        else return $this->performSignIn();
    }

    /**
     * Begins performing a user authentication using just user id and registered API key
     * @param $userId
     * @param $apiKey
     * @param $authToken
     * @return string
     */
    public function signInUsingApi($userId, $apiKey, $authToken)
    {
        $userCredentials=  $this->dao->getUserCredentialsByIdAndAuthToken($userId, $authToken);
        if(($userCredentials) && ($apiKey ==$this->apiKey))
        {
                $userId = $userCredentials['user_id'];
                $this->logLoginTime($userId);
                $this->increaseLogins($userId);
                return  $userCredentials['user_id'];
        }
        else return "Unable to find credentials in the database";
    }

    /**
     * Performs a series of functions for performing sign-in.
     * @return string
     */
    private function performSignIn()
    {
        $userCredentials=  $this->dao->getUserCredentials($this->email);
        if($userCredentials)
        {
            $email = $userCredentials['username'];
            $password = $userCredentials['password'];

            if(($email==$this->email) && ($password == $this->password)){
                $userId = $userCredentials['user_id'];
                $this->logLoginTime($userId);
                $this->increaseLogins($userId);
                return  $userId;
            }

        }
        else return "Unable to find credentials in the database";
    }


    private function logLoginTime($userId)
    {
        $date = time();
        $this->dao->logLoginTime($userId, $date);
    }


    private function increaseLogins($userId)
    {
        $this->dao->increaseTotalLogins($userId);
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