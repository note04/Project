<?php

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

require_once '../Controller/config.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    body{
    	background-color: white;
    	color: #000000;
    }
</style>
<?php

$query_poll = "SELECT * FROM poll WHERE created_by = 1008 AND poll_id = 1";
$rs1 = mysql_query($query_poll);

echo <<<HTML
    <form name="pollFrm" id="pollFrm" method="post" action="" >
HTML;

$i=1;
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
    $rs2 = mysql_query($query_question);
    
    //fetch question by poll_id
    while($obj2 = mysql_fetch_array($rs2)){
        
        
        echo $i.". ";
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
        $rs3 = mysql_query($query_choice);
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
                $rs4 = mysql_query($query_option);
                
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
    <button type="submit" name="btnSubmit" id="btnSubmit">ส่งข้อมูล</button>
    </form>
HTML;


// echo "<pre>";
// print_r($arrData);
// echo "</pre>";


?>
