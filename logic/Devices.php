<?php
include_once('dao.php');
class Devices{

    private $userId, $dao;

    public function __construct()
    {
        $this->dao = new dao();
        if(array_key_exists("user_id", $_SESSION)) 
            $this->userId= $_SESSION['user_id'];
    }

    /**
     * Returns a list of user devices
     * @return mixed
     */
    public function getDevices()
    {
        return $this->dao->getUserDevices($this->userId);
    }

    public function getAllUsers()
    {
        return $this->dao->getAllUsers();
    }

    public function deleteUser($userId)
    {
        return $this->dao->deleteUser($userId);
    }

    public function adminSignIn($username, $password)
    {
        if(($username=="sesan")&&($password=="D@milola1")) return true;
        else return false;
    }

    /**
     * Logs a user's IP to the database.
     * @param $ip
     * @param $url
     * @return mixed
     */
    public function logIp($ip, $url)
    {
        return $this->dao->logIp($ip, $url);
    }

    /**
     * Returns a list of user coupons
     * @return mixed
     */
    public function getCoupons()
    {
        return $this->dao->getUserCoupons($this->userId);
    }

    /**
     * Save paypal payment
     * @param $data
     * @return mixed
     */
    public function savePaypalPayment($data)
    {
        return $this->dao->savePaypalPayment($data);
    }

    public function addPayment($txnId,$amount,$userId)
    {
        return $this->dao->addPayment($txnId,$amount,$userId);
    }

    public function addFacebookBonus($time, $userId)
    {
        return $this->dao->addFacebookBonus($time,$userId);
    }

    public function addBonusTime($time, $userId)
    {
        return $this->dao->addBonusTime($time, $userId);
    }

    public function addResetEmailPasswordList($email)
    {
        if($this->resetEmailAlreadyAdded($email))
        {
            return "reset_email_already_sent";
        }
        else
        {
            if($this->userExists($email))
            {
                $this->dao->addResetEmailPasswordList($email);
                return "reset_sent";
            }
            else
            {
                return "user_not_found";
            }
        }
    }

    public function userExists($email)
    {
        return $this->dao->userExists($email);
    }

    public function resetEmailAlreadyAdded($email)
    {
        return $this->dao->resetEmailAlreadyAdded($email);
    }

    /**
     * Process IPN
     * @param $data
     * @return mixed
     */
    public function processIpn($data)
    {
    	$this->dao->addIpn($data);
    	$transactionUserArray = $this->dao->getUserFromTransactionId($data['txn_id']);
    	$transactionUser = $transactionUserArray[0]['user_id'];
    	if($transactionUser)
    		$this->dao->addPaymentToPaymentDatabase($transactionUser, $data);    	
        //return $this->dao->getUserCoupons($this->userId);
    }

    /**
     * Returns true if message data inserted in the db.
     * @param $postData
     * @return mixed
     */
    public function sendMessage($postData)
    {
        return $this->dao->insertNewMessage($postData['fName'],$postData['email'], $postData['message']);
    }

    /**
     * Applies a coupon
     * @param $couponCode
     * @param $device
     * @return mixed
     */
    public function applyCoupon($couponCode, $device)
    {
        $days=30;
        $validCoupon = $this->dao->validCoupon($this->userId, $couponCode);
        if($validCoupon)
        {
            if($validCoupon[0]['days_to_add'])$days = $validCoupon[0]['days_to_add'];
            if ($this->dao->applyCoupon($device, $days));
            return $this->dao->setCouponUsed($couponCode);
        }
        else return false;
    }

    /**
     * Returns a count of all registered devices.
     * @return mixed
     */
    public function getRegisteredDevicesCount()
    {
        return $this->dao->getRegisteredDevicesCount($this->userId);
    }

    /**
     * Returns a list of user devices.
     * @param $deviceId
     * @param $page
     * @return mixed
     */
    public function getDeviceContacts($deviceId, $page)
    {
        return $this->dao->getDeviceContacts($this->userId, $deviceId, $page);
    }

    /**
     * Returns a list of user devices.
     * @param $deviceId
     * @return mixed
     */
    public function getDeviceAllContacts($deviceId)
    {
        return $this->dao->getDeviceAllContacts($this->userId, $deviceId);
    }

    /**
     * Returns a list of user devices.
     * @param $deviceId
     * @return mixed
     */
    public function getDeviceContactsTotalNoRecords($deviceId)
    {
        return $this->dao->getDeviceContactsTotalNoRecords($this->userId, $deviceId);
    }

    /**
     * Returns the device's call logs.
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceCallLogs($deviceId, $page)
    {
        return $this->dao->getDeviceCallLogs($this->userId, $deviceId, $page);
    }

    /**
     * Returns the device's call logs.
     * @param $deviceId
     * @return bool
     */
    public function getDeviceAllCallLogs($deviceId)
    {
        return $this->dao->getDeviceAllCallLogs($this->userId, $deviceId);
    }

    /**
     * Returns the device's call logs.
     * @param $deviceId
     * @return bool
     */
    public function getDeviceCallLogsTotalNoRecords($deviceId)
    {
        return $this->dao->getDeviceCallLogsTotalNoRecords($this->userId, $deviceId);
    }

    /**
     * Returns the device's texts.
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceTexts($deviceId, $page)
    {
        return $this->dao->getDeviceTexts($this->userId, $deviceId, $page);
    }

    /**
     * Returns the device's texts.
     * @param $deviceId
     * @param $telephoneNumber
     * @param $limit
     * @internal param $page
     * @return bool
     */
    public function getDeviceTelephoneTexts($deviceId, $telephoneNumber, $limit)
    {
        return $this->dao->getDeviceTelephoneTexts($this->userId, $deviceId, $telephoneNumber, $limit);
    }

    /**
     * Returns the telephone numbers and names of people in the device's texts table.
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceTextsPeople($deviceId)
    {
        $textPhoneNumbers = $this->dao->getDeviceTextsPeople($deviceId);
        return $textPhoneNumbers;
    }

    /**
     * Returns the device's texts.
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceAllTexts($deviceId)
    {
        return $this->dao->getDeviceAllTexts($this->userId, $deviceId);
    }

    /**
     * Returns the device's texts.
     * @param $deviceId
     * @return bool
     */
    public function getDeviceTextsPages($deviceId)
    {
        return $this->dao->getDeviceTextsPages($this->userId, $deviceId);
    }

    /**
     * Returns the device's locations.
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceLocations($deviceId, $page)
    {
        return $deviceLocations = $this->dao->getDeviceLocations($this->userId, $deviceId, $page);
    }

    /**
     * Returns the device's locations.
     * @param $deviceId
     * @return bool
     */
    public function getDeviceAllLocations($deviceId)
    {
        return $deviceLocations = $this->dao->getDeviceAllLocations($this->userId, $deviceId);
    }

    /**
     * Returns the device's locations total no of records.
     * @param $deviceId
     * @return bool
     */
    public function getDeviceLocationsTotalNoRecords($deviceId)
    {
        return $deviceLocations = $this->dao->getDeviceLocationsTotalNoRecords($this->userId, $deviceId);
    }

    /**
     * Returns the device's info.
     * @param $deviceId
     * @return bool
     */
    public function getDeviceInfo($deviceId)
    {
        $infoArray = $this->dao->getDeviceInfo($this->userId, $deviceId);
        //If device description is null set as device id
        if(!$infoArray[0]['description']) $infoArray[0]['description'] = "Device - ".$infoArray[0]['deviceId'];
        return $infoArray[0];
    }

    /**
     * Returns the device's locations with addresses.
     * @param $deviceId
     * @param $page
     * @return bool
     */
    public function getDeviceLocationsWithAddress($deviceId, $page)
    {
        $deviceLocations = $this->dao->getDeviceLocations($this->userId, $deviceId, $page);
        $deviceLocationsWAddresses = array();
        foreach($deviceLocations as $deviceLocation)
        {
            $address = $this->getAddressFromGoogleMaps($deviceLocation['latitude'], $deviceLocation['longitude']);
            $deviceLocation['address'] = $address;
            $deviceLocationsWAddresses[] = $deviceLocation;
        }
        return $deviceLocationsWAddresses;
    }

    /**
     * Update's a devices description
     * @param $deviceDescription
     * @param $device
     * @return mixed
     */
    public function updateDeviceDescription($deviceDescription, $device)
    {
        return $this->dao->updateDeviceDescription($this->userId, $deviceDescription, $device);
    }

    /**
     * Given longitude and latitude in North America, return the address using The Google Geocoding API V3
     * @param $lat
     * @param $lon
     * @return array
     */
    public function getAddressFromGoogleMaps($lat, $lon)
    {
        $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=false";
        // Make the HTTP request
        $data = @file_get_contents($url);
        // Parse the json response
        $jsonData = json_decode($data,true);

        // If the json data is invalid, return empty array
        if (!$this->check_status($jsonData))   return array();

        /*
        $address = array(
            'country' => $this->googleGetCountry($jsonData),
            'province' => $this->googleGetProvince($jsonData),
            'city' => $this->googleGetCity($jsonData),
            'street' => $this->googleGetStreet($jsonData),
            'postal_code' => $this->googleGetPostalCode($jsonData),
            'country_code' => $this->googleGetCountryCode($jsonData),
            'formatted_address' => $this->googleGetAddress($jsonData),
        );
        */
        $address = $this->googleGetAddress($jsonData);
        return $address;
    }

    /*
    * Check if the json data from Google Geo is valid
    */

    private function check_status($jsonData) {
        if ($jsonData["status"] == "OK") return true;
        return false;
    }

    /*
    * Given Google Geocode json, return the value in the specified element of the array
    */

    private function googleGetCountry($jsonData) {
        return $this->findLongNameGiveType("country", $jsonData["results"][0]["address_components"]);
    }
    private function googleGetProvince($jsonData) {
        return $this->findLongNameGiveType("administrative_area_level_1", $jsonData["results"][0]["address_components"], true);
    }
    private function googleGetCity($jsonData) {
        return $this->findLongNameGiveType("locality", $jsonData["results"][0]["address_components"]);
    }
    private function googleGetStreet($jsonData) {
        return $this->findLongNameGiveType("street_number", $jsonData["results"][0]["address_components"]) . ' ' . $this->findLongNameGiveType("route", $jsonData["results"][0]["address_components"]);
    }
    private function googleGetPostalCode($jsonData) {
        return $this->findLongNameGiveType("postal_code", $jsonData["results"][0]["address_components"]);
    }
    private function googleGetCountryCode($jsonData) {
        return $this->findLongNameGiveType("country", $jsonData["results"][0]["address_components"], true);
    }
    private function googleGetAddress($jsonData) {
        return $jsonData["results"][0]["formatted_address"];
    }

    /*
    * Searching in Google Geo json, return the long name given the type.
    * (If short_name is true, return short name)
    */
    private function findLongNameGiveType($type, $array, $short_name = false) {
        foreach( $array as $value) {
            if (in_array($type, $value["types"])) {
                if ($short_name)
                    return $value["short_name"];
                return $value["long_name"];
            }
        }
    }

    /*
    *  Print an array
    */
    private function d($a) {
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }
}
?>
