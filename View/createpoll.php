<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=UTF-8">
<title>Create Poll</title>
<link rel="stylesheet" href="../jquery/css/start/jquery-ui-1.10.1.custom.css" type="text/css" />
<link rel="stylesheet" href="../css/myStyle.css" type="text/css" />
<script language="JavaScript" src="../jquery/js/jquery-1.9.1.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/js/jquery-ui-1.10.1.custom.js" type="text/javascript"></script>
<script language="JavaScript" src="../js/CustomForm.js" type="text/javascript"></script>

<!-- Form Dialog -->
<div id="dialog-form" title="" class="div ui-widget-content ui-corner-all">
  
<?php
//ไปแก้ไข Config database ที่ไฟล์นี้นะ
require_once '../Controller/config.php';
?>   
 
  
  
  <form id="formMain" name="formMain" method="POST" action="../Controller/SavePollAction.php">
		
        <fieldset id="dataSet">
            <FIELDSET class="fieldset ui-widget-content ui-corner-all"><LEGEND>แบบสอบถาม/Poll</LEGEND>
                <label for="question">หัวข้อแบบสอบถาม/Poll Title</label><br />
                <input type="text" id="pollTitle" name="pollTitle" placeholder="ยังไม่ได้ระบุหัวข้อ" />

                <br /><br />

                <label for="description">รายละเอียด/Description</label><br />
                <textarea id="description" name="description" cols="30" rows="5"></textarea>
            </FIELDSET>
            
            <br /><br />
            
            <FIELDSET class="fieldset ui-widget-content ui-corner-all"><LEGEND>กลุ่มเป้าหมาย/Target group</LEGEND>
                <label for="occupation">อาชีพ/Occupation</label><br />
                <select id="occpu" name="occpu[]" multiple class="" />
                <?php
                    $q1="select * from occupation order by OCCUPATION_NAME_ENG";
                    $sql2=mysql_query($q1);
                    while($rs=mysql_fetch_array($sql2)){
                ?>
                <option value="<?php echo $rs['OCCUPATION_ID']?>"><?php echo $rs['OCCUPATION_NAME_ENG']." - ".$rs['OCCUPATION_NAME']?></option>
                <?php }
                ?>
                </select>

                <br /><br />

                <label for="county">จังหวัด/Country</label><br />
                <select id="country" name="country[]" multiple class="">
                <?php
                    $q="select * from province order by PROVINCE_NAME_ENG";
                    $qr=mysql_query($q);
                    while($rs=mysql_fetch_array($qr)){
                ?>
                <option value="<?php echo $rs['PROVINCE_ID']?>"><?php echo $rs['PROVINCE_NAME_ENG']." - ".$rs['PROVINCE_NAME']?></option>
                <?php }
                mysql_close($link);
                ?>
                </select>

                <br /><br />

                <label for="sex">เพศ/Sex</label><br />
                <select name="sex" id="sex" size="1" class="">
                  <option value="0" select="selected">ไม่ระบุ/Not specified</option>
                  <option value="1">ชาย/Male</option>
                  <option value="2">หญิง/Female</option>

                </select>

                <br /><br />

                <label for="age">อายุ/Age</label><br />
                <input type="checkbox" name="age[]" id="agefrom1" value="1" />15-24 Year old
                <input type="checkbox" name="age[]" id="agefrom2" value="2"  />25-34 Year old
                <input type="checkbox" name="age[]" id="agefrom3" value="3"  />35-44 Year old
                <br />
                <input type="checkbox" name="age[]" id="agefrom4" value="4"  />45-54 Year old
                <input type="checkbox" name="age[]" id="agefrom5" value="5"  />55-64 Year old
                <input type="checkbox" name="age[]" id="agefrom6" value="6"  />65 Up Year old
            </FIELDSET>
            
<!--            <br /><br />
            <hr />-->
            <br /><br />
            
            <div id="areaQuest">
                
            </div>
            
            <span class='br'><br /></span>
            <span class='br'><br /></span>

                
        </fieldset>

    </form>
    <div id="btnFix"><button name="btnAddQuestion" id="btnAddQuestion">เพิ่มคำถาม</button><button name="btn" id="btnSave">บันทึกข้อมูล</button></div>

    <br /><br />
    <hr />
    <br /><br />

    <span id="showResult"></span>
</div>
<!-- End Form Dialog -->


</body>
