<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
date_default_timezone_set("Asia/Bangkok");
require_once '../Controller/config.php';

//echo count($_POST);
//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

$userId = $_POST['userId'];
$pollId = $_POST['pollId'];
$poll = $_POST['poll'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
if(count($_POST)>7){
    $_date_time_stamp = date("Y-m-d H:i:s");
    
    
    for($i = 0;$i<count($_POST['questionId']);$i++){
        $questionId = $_POST['questionId'][$i];

        for($j = 0;$j<count($_POST['data'.$i]);$j++){
            
            $answerValue = $_POST['data'.$i][$j];
            
            $sql_answer = "INSERT INTO `answer` (`user_id`, `poll_id`, `question_id`, `answer_value`, `created_date`) VALUES ('".$userId."', '".$pollId."', '".$questionId."', '".$answerValue."', '".$_date_time_stamp."')";
            $result = mysql_query($sql_answer) or die("Error SQL[ ".$sql_answer." ] ".mysql_error());
            
        }
    }
    
    if($result){
        
        $query = "SELECT COUNT(*) FROM user WHERE user_id = '".$userId."'";
        $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
        $numcount = mysql_num_rows($result);
        if($numcount==0){
            //if not have user
           $query = "INSERT INTO `user` (`user_id`, `first_name`, `last_name`) VALUES ('".$userId."', '".$first_name."', '".$last_name."')";
           $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error()); 
        }
        
        header("Location: ../View/viewPoll.php?pollId=$pollId&poll=$poll");
    }
    mysql_close();
}else{
    header("Location: ../View/viewPoll.php?pollId=$pollId&poll=$poll");
//    echo '<script>';
//    echo 'window.location.href = encodeURI("../View/viewPoll.php?userId='.$userId.'&pollId='.$pollId.'&poll='.$poll.'")';
//    echo '</script>';
}
?>