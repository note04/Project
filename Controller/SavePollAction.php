<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
date_default_timezone_set("Asia/Bangkok");
require_once '../Controller/Config.php';
include '../Controller/ConnectFB.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * @param $arr
 * @type Array
 */
$arr = array();


/*
 * Set data to $arr
 */
for($i=0;$i<count($_POST["question"]);$i++){
        $index = $i+1;
        $arr[$i]["POLL_TITLE"] = $_POST["pollTitle"]; 

        $arr[$i]["DESCRIPTION"] = $_POST["description"];
    
        for($a=0;$a<count($_POST["occpu"]);$a++){
            $arr[$i]["OCCUPATION"][$a] = $_POST["occpu"][$a];
        }

        for($b=0;$b<count($_POST["country"]);$b++){
            $arr[$i]["COUNTRY"][$b] = $_POST["country"][$b];
        }
    
        if($_POST["sex"]!=0){
            $arr[$i]["SEX"] = $_POST["sex"];
        }
            
        for($c=0;$c<count($_POST["age"]);$c++){
            $arr[$i]["AGE"][$c] = $_POST["age"][$c];
        }
        
	$arr[$i]["QUESTION"] = $_POST["question"][$i];

	$arr[$i]["QUESTION_TYPE"] = $_POST["qType$i"];
        
        
        if($_POST["qType$i"]!=4){
            for($d=0;$d<count($_POST["data$index"]);$d++){

                $arr[$i]["ANSWER"][$d] = $_POST["data$index"][$d];
                
            }
        }else{

//            for($e=0;$e<2;$e++){
//                $arr[$i]["ANSWER"][$e] = $_POST["scale".($index+$e)];
//                $arr[$i]["OPTION_SCALE"][$e] = $_POST["_data".($index+$e)];
//            }
            $arr[$i]["ANSWER"][0] = $_POST["scale".(($index+1)*2)];
            $arr[$i]["ANSWER"][1] = $_POST["scale".(($index+2)*4)];
            $arr[$i]["OPTION_SCALE"][0] = $_POST["_data".(($index+1)*2)];
            $arr[$i]["OPTION_SCALE"][1] = $_POST["_data".(($index+2)*4)];
            
        }

}

//echo "<pre>";
//print_r($arr);
//echo "</pre>";
    
//$json = json_encode($arr);

//$obj = json_decode($json, true);

//echo "<br />";
//echo "<br />";
//echo "<hr />";
//echo "<br />";
//echo "JSON Decode :";
//echo "<br />";

//echo var_dump($obj);





/*
 * 
 * Extract $arr
 * Print Data
 * 
 */

$_index_ = 0;
$_poll_title = "";
$_poll_desc = "";

$_question_title = array();
$_question_type = array();
$_condition = array();

$_date_time_stamp = date("Y-m-d H:i:s");

foreach($arr as $key=>$data){echo "<br /><hr />";
	foreach($data as $label=>$value){
		if($label=="OCCUPATION"){
//			echo $label;
//			echo "<br />";
			foreach($value as $val=>$a){
//				echo $val." => ".$a;
//				echo "<br />";
                                
                                $_condition[$label][$val] = $a;
			}
		}elseif($label=="COUNTRY"){
//			echo $label;
//			echo "<br />";
			foreach($value as $val=>$a){
//				echo $val." => ".$a;
//				echo "<br />";
                                
                                $_condition[$label][$val] = $a;
			}
		}elseif($label=="AGE"){
//			echo $label;
//			echo "<br />";
			foreach($value as $val=>$a){
//				echo $val." => ".$a;
//				echo "<br />";
                                
                                $_condition[$label][$val] = $a;
			}
		}elseif($label=="SEX"){
//			echo $label." => ".$value;
//			echo "<br />";
                        
                        $_condition[$label][0] = $value;
                        
		}elseif($label=="ANSWER"){
//			echo $label;
//			echo "<br />";
			foreach($value as $val=>$a){
//				echo $val." => ".$a;
//				echo "<br />";
                                
                                $_condition[$key][$label][$val] = $a;
			}
		}elseif($label=="OPTION_SCALE"){
//			echo $label;
//			echo "<br />";
			foreach($value as $val=>$a){
//				echo $val." => ".$a;
//				echo "<br />";
                                
                                $_condition[$key][$label][$val] = $a;
			}
		}else{
                    
                        if($label=="POLL_TITLE"){
                            $_poll_title = $value;
                        }elseif($label=="DESCRIPTION"){
                            $_poll_desc = $value;
                        }elseif($label=="QUESTION"){
                            $_question_title[$_index_] = $value;
                        }elseif($label=="QUESTION_TYPE"){
                            $_question_type[$_index_] = $value;
                        }
//                        echo $label." => ".$value;
//                        echo "<br />";
		}
                
	}
        $_index_++;
}


/*
 * 
 * Insert data to database
 */
$userId = $me['id'];
$first_name = $me['first_name'];
$last_name = $me['last_name'];

//Insert Poll
$query = "INSERT INTO `poll` (`poll_title`, `poll_desc`, `created_by`, `created_date`) VALUES ('".$_poll_title."', '".$_poll_desc."', '".$userId."', '".$_date_time_stamp."')";
$result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
//End Poll

//Query User
$query = "SELECT COUNT(*) FROM user WHERE user_id = '".$userId."'";
$result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
$numcount = mysql_num_rows($result);
if($numcount==0){
    //if not have user
   $query = "INSERT INTO `user` (`user_id`, `first_name`, `last_name`) VALUES ('".$userId."', '".$first_name."', '".$last_name."')";
   $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error()); 
}

if($result){
    
    $query = "SELECT MAX(poll_id) as poll_id FROM poll";
    $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
    
    if($obj = mysql_fetch_array($result)){
        
        $poll_id = $obj["poll_id"];

        //Insert Question
        foreach($_question_title as $key => $value){
            
            $query = "INSERT INTO `question` (`poll_id`, `question_type`, `question_value`) VALUES ('".$poll_id."', '".$_question_type[$key]."', '".$value."')";
            $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
            
            $query = "SELECT MAX(question_id) as question_id FROM question";
            $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
            
            if($obj = mysql_fetch_array($result)){
                
                $question_id = $obj["question_id"];
                       
                foreach ($_condition[$key]["ANSWER"] as $key1 => $value1) {
                        
                    $query = "INSERT INTO `choice` (`poll_id`, `question_id`, `question_type`, `choice_value`) VALUES ('".$poll_id."', '".$question_id."', '".$_question_type[$key]."', '".$value1."')";
                    $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
                    
                    if($_question_type[$key]==4){
                        $query = "SELECT MAX(choice_id) as choice_id FROM choice";
                        $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
                        if($obj = mysql_fetch_array($result)){
                            $choice_id = $obj["choice_id"];

                            $query = "INSERT INTO `option_scale` (`choice_id`, `option_value`) VALUES ('".$choice_id."', '".$_condition[$key]["OPTION_SCALE"][$key1]."')";
                            $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());

                        }
                    }                   
                }           
            }
        }
        //End Question
        
        //Insert Condition
        if(count($_condition["OCCUPATION"])!=0){
            foreach($_condition["OCCUPATION"] as $key => $value){
                $query = "INSERT INTO `condition` (`poll_id`, `condition_type`, `condition_value`) VALUES ('".$poll_id."', '1', '".$value."')";
                $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
            }
        }
        
        if(count($_condition["COUNTRY"])!=0){
            foreach($_condition["COUNTRY"] as $key => $value){
                $query = "INSERT INTO `condition` (`poll_id`, `condition_type`, `condition_value`) VALUES ('".$poll_id."', '2', '".$value."')";
                $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
            }
        }
        
        if(count($_condition["SEX"])!=0){
            foreach($_condition["SEX"] as $key => $value){
                $query = "INSERT INTO `condition` (`poll_id`, `condition_type`, `condition_value`) VALUES ('".$poll_id."', '3', '".$value."')";
                $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
            }
        }
        
        if(count($_condition["AGE"])!=0){
            foreach($_condition["AGE"] as $key => $value){
                $query = "INSERT INTO `condition` (`poll_id`, `condition_type`, `condition_value`) VALUES ('".$poll_id."', '4', '".$value."')";
                $result = mysql_query($query) or die("Error SQL[ ".$query." ] ".mysql_error());
            }
        }
        //End Condition
       
    }

}
mysql_close();

echo '<script>';
echo 'window.location.href = encodeURI("../View/viewPoll.php?userId='.$userId.'&pollId='.$poll_id.'&poll='.$_poll_title.'")';
echo '</script>';
//header("Location: ../View/viewPoll.php?userId=".$poll_id."&pollId=".$poll_id);


?>
