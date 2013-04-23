<?php
header("Content-type:text/html; charset=UTF-8");       
header("Cache-Control: no-store, no-cache, must-revalidate");      
header("Cache-Control: post-check=0, pre-check=0", false);

require '../Controller/ConnectFB.php';
require_once '../Controller/config.php';


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


//    echo $cnt . "<br />";    
if($me['location']['name']==NULL){
//    echo "Location is null" . "<br />";
}else{
    if($cnt==1){
//        echo $location_tmp[0] . "<br />";
        $location = $location_tmp[0];
    }else if($cnt==2){
//        echo $location_tmp[0] . "<br />";
        $location = $location_tmp[0];
    }else if($cnt==3){
//        echo $location_tmp[1] . "<br />";
        $location = $location_tmp[1];
    }
}
?>
<!doctype html>

<form onsubmit="return checkFrm()" id="formMain" name="formMain" method="POST" action="../View/viewPoll.php?pollId=<?php echo $_GET['pollId'] ?>&poll=<?php echo $_GET['poll'] ?>"  >
      <FIELDSET class="fieldset ui-widget-content ui-corner-all"><LEGEND>ข้อมูลบุคคล/Personal Info</LEGEND>
                <label for="occupation">สายอาชีพ/Occupation</label><br />
                <select id="occpu" name="occpu" style="width: 250px"  class="" />
                <option value="0" selected="selected">ไม่มีข้อมูล/No data</option>
                <?php
                    $q1="select * from m_occupation order by OCCUPATION_NAME_ENG";
                    $sql2=mysql_query($q1);
                    while($rs=mysql_fetch_array($sql2)){
                ?>
                <option value="<?php echo $rs['OCCUPATION_ID']?>"><?php echo $rs['OCCUPATION_NAME_ENG']." - ".$rs['OCCUPATION_NAME']?></option>
                <?php }
                ?>
                </select>

                <br /><br />

                <label for="county">จังหวัด/Country</label><br />
                <select id="country" name="country" style="width: 250px" class="">
                <option value="0" selected="selected">ไม่มีข้อมูล/No data</option>
                <?php
                    $q="select * from m_province order by PROVINCE_NAME_ENG";
                    $qr=mysql_query($q);
                    while($rs=mysql_fetch_array($qr)){
                ?>
                <option value="<?php echo $rs['PROVINCE_ID']?>"<?php  if($location == $rs['PROVINCE_NAME_ENG']) echo 'selected';?>><?php echo $rs['PROVINCE_NAME_ENG']." - ".$rs['PROVINCE_NAME']?></option>
                <?php }
                mysql_close($link);
                ?>
                </select>

                <br /><br />

                <label for="sex">เพศ/Sex</label><br />
                <select name="sex" id="sex">
                  <option value="0" selected="selected">ไม่มีข้อมูล/No data</option>
                  <option value="1" <?php if($sex == 'male') echo 'selected';?>>ชาย/Male</option>
                  <option value="2" <?php  if($sex == 'female') echo 'selected';?>>หญิง/Female</option>

                </select>

                <br /><br />
                <label for="age">ช่วงอายุ/Age Range</label><br />
                <select name="age" id="age">
                  <option value="0" selected="selected">ไม่มีข้อมูล/No data</option>
                  <option value="1" <?php  if(floor($age)>=15&&floor($age)<=24) echo 'selected'; ?>>15-24 Year old</option>
                  <option value="2" <?php  if(floor($age)>=25&&floor($age)<=34) echo 'selected';?>>25-34 Year old</option>
                  <option value="3" <?php  if(floor($age)>=35&&floor($age)<=44) echo 'selected';?>>35-44 Year old</option>
                  <option value="4" <?php  if(floor($age)>=45&&floor($age)<=54) echo 'selected';?>>45-54 Year old</option>
                  <option value="5" <?php  if(floor($age)>=55&&floor($age)<=64) echo 'selected';?>>55-64 Year old</option>
                  <option value="6" <?php  if(floor($age)>=65&&floor($age)<=99) echo 'selected';?>>65 Up Year old</option>

                </select>
                
                <br /><br />
                <button type="submit" name="btn" id="btnNext">Next</button>
            </FIELDSET>
    </form>
  </body>
</html>

<script>
function checkFrm(){
    var occpu = document.getElementById('occpu').value;
    var country = document.getElementById('country').value;
    var sex = document.getElementById('sex').value;
    var age = document.getElementById('age').value;
    
    var pollId = '<?php echo $_GET['pollId'] ?>';
    var poll = '<?php echo $_GET['poll'] ?>';
    
    if(occpu==0 || country==0 || sex==0 || age==0){
        alert("โปรดกรอกข้อมูลให้ครบ !!!");
        return false;
    }else{
        //alert(encodeURI("../View/viewPoll.php?pollId="+pollId+"&poll="+poll+""));
        //window.location.href = encodeURI("../View/viewPoll.php?pollId="+pollId+"&poll="+poll);
        return true;
    }
}
</script>