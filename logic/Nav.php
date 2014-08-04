<?php
include('nav-dao.php');
class Nav{

    private $userId, $dao;

    public function __construct()
    {
        $this->dao = new navDao();        
        if(array_key_exists("user_id", $_SESSION)) 
            $this->userId= $_SESSION['user_id'];
    }

    /**
     * Returns a count of all registered devices.
     * @return mixed
     */
    public function getRegisteredDevicesCount()
    {
        return $this->dao->getRegisteredDevicesCount();
    }

}
?>
