<?php
session_start();
//$expires = 3600*24;// เท่ากับ 1 * 24ชั่วโมง
//$expires = 3600;
//$lastMod = @strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);
//if($lastMod + ($expires) >= time())
//{
//	header('HTTP/1.1 304 Not Modified');
//	header('Connection: close');
//	exit;
//}else{
//	header('Last-modified: '.gmdate('D, d M Y H:i:s'));
//	header('Expires: '.gmdate('D, d M Y H:i:s', time()+$expires));
//	header('ETag: ');//ลบ ทิ้ง
//}
header("Content-type:text/html; charset=UTF-8");       
header("Cache-Control: no-store, no-cache, must-revalidate");      
header("Cache-Control: post-check=0, pre-check=0", false); 

require_once '../Controller/Config.php';
include '../Controller/ConnectFB.php';


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<head>
<title><?php echo $_GET['poll'] ?></title>
<link rel="image_src" href="../images/LogoShared2.png" />
</head>
<style>
    body{
    	background-color: white;
    	color: #000000;
    }
</style>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<?php

$arrConType = array();
$arrConValue = array();
$arrConPost = array();
$index = 0;
$countValue = NULL;

$userId = $me['id'];

if(count($_POST)>0){
    $arrConPost[1] = $_POST['occpu'];
    $arrConPost[2] = $_POST['country'];
    $arrConPost[3] = $_POST['sex'];
    $arrConPost[4] = $_POST['age'];


    $check_con = "SELECT * FROM `condition` WHERE poll_id = ".$_GET['pollId'];
    $rs = mysql_query($check_con)  or die("Error SQL[ ".$sql_check_b." ] ".mysql_error());
    while ($row = mysql_fetch_array($rs)) {
        $arrConType[$index] = $row['condition_type'];
        $arrConValue[$index] = $row['condition_value'];
        $index++;
    }
    mysql_free_result($rs);

    if(count($arrConType)!=0){
        $countValue = 0;
        for($i = 0;$i<count($arrConType);$i++){
            if($arrConPost[$arrConType[$i]] != $arrConValue[$i]){
                $countValue++;
            }
        }
    }

    if($countValue!=NULL){
        if($countValue!=count($arrConType)){
            ?>
            <script>
            alert('เงื่อนไขคุณไม่เพียงพอ');
            window.location.href = '../Interface/MenuHome.php';
            </script>
            <?php
            //header("Location: ../Interface/MenuHome.php");
        }
    }
}


//Count answer
$sql_check_a = "SELECT COUNT(*) AS count FROM poll WHERE created_by = '".$userId."'";
$rs_ss_a = mysql_query($sql_check_a) or die("Error SQL[ ".$sql_check_a." ] ".mysql_error());
while ($row = mysql_fetch_array($rs_ss_a)) {
    $numrs_a = $row['count'];
}
mysql_free_result($rs_ss_a);

//Count answer
$sql_check_b = "SELECT COUNT(*) AS count FROM answer WHERE user_id = '".$userId."'";
$rs_ss_b = mysql_query($sql_check_b) or die("Error SQL[ ".$sql_check_b." ] ".mysql_error());
while ($row = mysql_fetch_array($rs_ss_b)) {
    $numrs_b = $row['count'];
}
mysql_free_result($rs_ss_b);

$save_disable = "";
if(($numrs_a == 0) && ($numrs_b == 0)){
    $save_disable = "";
    @header("Location: ../View/CheckCondition.php?pollId=".$_GET['pollId']."&poll=".$_GET['poll']."");
}else{
    $save_disable = "disabled";
}

if(isset($userId) && isset($_GET['pollId'])){
    if(($userId!=NULL && $userId!="") || ($_GET['pollId']!=NULL && $_GET['pollId']!="")){

        $pollId = $_GET['pollId'];

        $query_poll = "SELECT * FROM poll WHERE poll_id = ".$pollId;
        $rs1 = mysql_query($query_poll) or die("Error SQL[ ".$query_poll." ] ".mysql_error());

        echo <<<HTML
            <form name="pollFrm" id="pollFrm" method="post" action="../Controller/SaveAnswerAction.php" >
HTML;

        $i=0;
        $inputType = "";
        $arrData = array();
        $arrScale = array();

        //fetch poll by created_by AND poll_id
        while($obj1 = mysql_fetch_array($rs1)){


            echo $obj1['poll_title'];
            echo "<br />";
            echo $obj1['poll_desc'];
            echo "<br />";  

            $arrData['poll_title'] = $obj1['poll_title'];
            $arrData['poll_desc'] = $obj1['poll_desc'];

            $query_question = "SELECT * FROM question WHERE poll_id = ".$obj1['poll_id'];
            $rs2 = mysql_query($query_question) or die("Error SQL[ ".$query_question." ] ".mysql_error());

            //fetch question by poll_id
            while($obj2 = mysql_fetch_array($rs2)){

                echo '<input type="hidden" name="questionId[]" value="'.$obj2['question_id'].'" />';
                echo ($i+1).". ";
                echo $obj2['question_value'];
                echo "<br />";


                if($obj2['question_type']==1){
                    $inputType = '<input type="radio" name="data'.$i.'[]" />';
                }else if($obj2['question_type']==2){
                    $inputType = '<input type="checkbox" name="data'.$i.'[]" />';
                }else if($obj2['question_type']==3){
                    $inputType = '<input type="text" autocomplete="off" name="data'.$i.'[]" />';
                }else if($obj2['question_type']==4){
                    $inputType = 'scale';
                    $inputTypeScale = '';
                }


                $query_choice = "SELECT * FROM choice WHERE question_id = ".$obj2['question_id']." AND poll_id = ".$obj1['poll_id'];
                $rs3 = mysql_query($query_choice) or die("Error SQL[ ".$query_choice." ] ".mysql_error());
                $j=0;
                $k=0;

                $arrScale = array();
                $arrScaleLabel = array();

                //fetch choice by question_id AND poll_id
                while($obj3 = mysql_fetch_array($rs3)){

                    if($inputType!="scale"){
                        if($obj2['question_type']==3){
                            echo $inputType;
                            echo "<br />";

                            $arrData[$i][$obj2['question_value']][$k] = $inputType;
                            $k++;
                        }else{

                                if($obj2['question_type']==1){
                                        $inputType = '<input type="radio" name="data'.$i.'[]" value="'.$obj3['choice_value'].'" />';
                                }else if($obj2['question_type']==2){
                                        $inputType = '<input type="checkbox" name="data'.$i.'[]" value="'.$obj3['choice_value'].'" />';
                                }

                            echo $inputType." ".$obj3['choice_value'];
                            echo "<br />";

                            $arrData[$i][$obj2['question_value']][$k] = $inputType." ".$obj3['choice_value'];
                            $k++;
                        }
                    }else{

                        $arrScale[$j] = $obj3['choice_value'];


                        $query_option = "SELECT * FROM option_scale WHERE choice_id = ".$obj3['choice_id'];
                        $rs4 = mysql_query($query_option) or die("Error SQL[ ".$query_option." ] ".mysql_error());

                        //fetch option_scale by choice_id
                        while($obj4 = mysql_fetch_array($rs4)){

                                $arrScaleLabel[$j] = $obj4['option_value'];

                                $arrData[$i][$obj2['question_value']][$obj3['choice_value']] = $obj4['option_value'];

                        }

                        if($j==1){

                                for($loop = $arrScale[0]; $loop <= $arrScale[1]; $loop++){
                                        $inputTypeScale .= '<input type="radio" name="data'.$i.'[]" value="'.$loop.'" />';
                                }
                                echo $arrScaleLabel[0]." [".$arrScale[0]."] ".$inputTypeScale." [".$arrScale[1]."] ".$arrScaleLabel[1];
                                echo "<br />";
                        }

                        $j++;
                    }              
                }
                echo "<br />";
                $i++;
            }    
        }
        mysql_close();
        echo "<br />";
        echo <<<HTML
            <input type="hidden" name="userId" value="{$userId}" />
            <input type="hidden" name="pollId" value="{$_GET['pollId']}" />
            <input type="hidden" name="poll" value="{$_GET['poll']}" />
            <input type="hidden" name="first_name" value="{$me['first_name']}" />
            <input type="hidden" name="last_name" value="{$me['last_name']}" />
            <input type="submit" name="btnSubmit" id="btnSubmit" value="ส่งคำตอบ" {$save_disable} />
            <a name="fb_share" type="button" href="http://www.facebook.com/sharer.php">Share</a>    
            </form>
HTML;


        // echo "<pre>";
        // print_r($arrData);
        // echo "</pre>";

    }
}else{
    echo "Please login to access this";
}
?> 