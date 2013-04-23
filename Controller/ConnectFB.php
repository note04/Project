<?php
require $_SERVER['DOCUMENT_ROOT'].'/project/Class/Facebook/facebook.php';

// Fix IE Cookie bug problem
//header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');

$appId = '145809745587554';
$secret = '622a5e039f56d69576954c0224dc6fbd';

$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $secret,
  'cookie' => true,
));

$uid = $facebook->getUser();

$me = null;
if ($uid) {
  try {
    
    $me = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}
if(!$me) {
    $url =   "https://www.facebook.com/dialog/oauth?"
            ."client_id=$appId&"
            ."redirect_uri=http://apps.facebook.com/testquestionnaires/&"
            ."scope=publish_stream,user_birthday,user_location";
    ?>
    <!doctype html>
    <html xmlns:fb="http://www.facebook.com/2008/fbml">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
            <script language=javascript>window.open('<?php echo $url ?>', '_parent')</script>
        </head>
    </html>

    <?php
    exit;
}
else{
//    echo "<pre>";
//        print_r($me);
//    echo "</pre>";
    
    $yearnow = date("Y");
    $monthnow = date("n");
    $daynow = date("j");  
    $dateuser = explode("/", $me['birthday']);
    if($dateuser[0]!=null && $dateuser[1]!=null && $dateuser[2]!=null){
        $caldatenow = mktime(0, 0, 0, $monthnow, $daynow, $yearnow);
        $caldateuser = mktime(0, 0, 0, $dateuser[0], $dateuser[1], $dateuser[2]);
        $agesec = $caldatenow-$caldateuser;
        $age = $agesec/31556736;
    }
    $location_tmp = explode(", ", $me['location']['name']);
    $location = null;
    $sex = $me['gender'];
    $cnt = count($location_tmp);
//    echo $me['id'] . "<br />";
//    echo $me['first_name'] . " " .$me['last_name'] . "<br />";
//    if($me['birthday']==NULL){
//        echo "No birth day" . "<br />";
//    }else{
//        echo floor($age) . "<br />";
//        echo $caldateuser . "<br />";
//        echo $caldatenow . "<br />";
//        echo $me['birthday'] . "<br />";
//    }
    
//    if($me['location']['name']==NULL){
//        echo "Location is null" . "<br />";
//    }else{
//        if($cnt==1){
//            echo $location_tmp[0] . "<br />";
//            $location = $location_tmp[0];
//        }else if($cnt==2){
//            echo $location_tmp[0] . "<br />";
//            $location = $location_tmp[0];
//        }else if($cnt==3){
//            echo $location_tmp[1] . "<br />";
//            $location = $location_tmp[1];
//        }
//    }
//    echo $sex . "<br />";
//    echo $age . "<br />";
} 
?>