
//GLOBAL VARIABLE

//var radio = '<input type="radio" name="radio" disabled />';
//	radio +='<input name="data[radio]" type="text" placeholder="ระบุตัวเลือก" />';
//	
//var radioOther = '<input type="radio" name="radio" disabled />';
//	radioOther +='&nbsp;อื่นๆ : &nbsp;<input name="data[radio]" type="text" value="คำตอบของผู้อื่น" disabled />';
//		
//var check = '<input type="checkbox" name="checkbox" disabled />';
//	check +='<input name="data[checkbox]" type="text" placeholder="ระบุตัวเลือก" />';
//
//var checkOther = '<input type="checkbox" name="checkbox" disabled />';
//	checkOther +='&nbsp;อื่นๆ : &nbsp;<input name="data[checkbox]" type="text" value="คำตอบของผู้อื่น" disabled />';
//	
//var text  ='<input name="data" type="text" value="คำตอบของพวกเขา" disabled />';



//END GLOBAL VARIABLE


//BEGIN Ready
$(function(){
	$("input[type=submit], button").button();
        
        //onLoad
        createQuestion();
            
        $("#btnAddQuestion").click(function(){
            createQuestion();
        });
        
	//Change question type
//	$("#qType").change(function(){
//		var choice = $("#qType").val();
//		if(choice==1){
//
//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
////			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
//			$("span#fadd").first().remove();
//			$("span[id^=fdel]").remove();
//			aClick(choice);
//			
//		}else if(choice==2){
//
//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
////			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
//			$("span#fadd").first().remove();
//			$("span[id^=fdel]").remove();
//			aClick(choice);
//            
//		}else if(choice==3){
//			
//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
////			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
//			$("span#fadd").first().remove();
//			$("span[id^=fdel]").remove();
//			aClick(choice);
//            
//		}else{
//			
//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
////			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
//			$("span#fadd").first().remove();
//			$("span[id^=fdel]").remove();
//			aClick(choice);
//			
//		}
//		
//		
//	});
		
	
	//Action Save
//    $("#btnSave").button().click( function() {
//    	if($("#showResult").empty()){
////    		alert("remove");
//    		
//    		$.ajax({
//            	url: $("#formMain").attr("action"),
//                type: $("#formMain").attr("method"),
//                data: $("#formMain").serialize(),
//                dataType: "html",
//                global: false,
//                async: false,
//                statusCode: { 
//                	404: function() { 
//                			alert("page not found"); 
//                		}
//                },
//                success: function(msg){ 
////                	alert($("#formMain").serialize());
////                	$("#showResult").append($("#formMain").serialize());           	
////                	$("#showResult").append("<br />");
//                	$("#showResult").empty().append(msg);
////                	$("#showResult").html(msg);
//        		}
//            });
//    	}else{
////    		alert("not remove");
//    	}
//        
//    });
    //END Action Save
	
    $("#btnSave").button().click( function() {	
        $("#formMain").submit();
    });	
    
    
    
    
});
//END Ready


function addLink(data, attrName, objId){
	var other = 0;
	var aLink = "";
	if(data==1){
		other = 4;
	}else{
		other = 5;
	}
	
	if(data==3){
//		aLink = '<span id="fadd">&nbsp;&nbsp;&nbsp;';
//		aLink +='<a id="addA" onclick="javascript: aClick('+data+')" href="#btn">เพิ่ม</a>&nbsp;&nbsp;</span>';
//                aLink +='</span>';
//		aLink +='<span id="fdel'+objId+'"><a onclick="javascript: aClickDel('+attrName+','+objId+')" href="#">ลบ</a></span>';
	}else if(data==4){
		data = 1;
		aLink = '<span id="fadd">&nbsp;&nbsp;&nbsp;';
		aLink +='<a id="addA" onclick="javascript: aClick('+data+')" href="#btn">เพิ่ม</a>&nbsp;&nbsp;</span>';
		aLink +='<span id="fdel'+objId+'"><a onclick="javascript: aClickDel('+attrName+','+objId+')" href="#">ลบ</a></span>';
	}else if(data==5){
		data = 2;
		aLink = '<span id="fadd">&nbsp;&nbsp;&nbsp;';
		aLink +='<a id="addA" onclick="javascript: aClick('+data+')" href="#btn">เพิ่ม</a>&nbsp;&nbsp;</span>';
		aLink +='<span id="fdel'+objId+'"><a onclick="javascript: aClickDel('+attrName+','+objId+')" href="#">ลบ</a></span>';
	}else{
		aLink = '<span id="fadd">&nbsp;&nbsp;&nbsp;';
		aLink +='<a id="addA" onclick="javascript: aClick('+data+')" href="#btn">เพิ่ม</a>&nbsp;&nbsp;';
//		aLink +='<a onclick="javascript: aClick('+other+')" href="#">อื่นๆ</a>&nbsp;&nbsp;</span>';
		aLink +='</span>';
		aLink +='<span id="fdel'+objId+'"><a onclick="javascript: aClickDel('+attrName+','+objId+')" href="#">ลบ</a></span>';
	}
	
	return aLink;
}


//Anchor click event
function aClick(choice){
	if(choice==1){
		
		$("span#fadd").first().remove();
		createRadio(choice);
		
	}else if(choice==2){
		
		$("span#fadd").first().remove();
		createCheckbox(choice);
		
	}else if(choice==3){
		
		$("span#fadd").first().remove();
		createText(choice);
		
	}else if(choice==4){
		
		$("span#fadd").first().remove();
		createScale(choice);
		
	}else{
		$("span#fadd").first().remove();
	}
}
//END Anchor click event


function aClickDel(attrName, objId){

	$(attrName).remove();
	$("#data"+objId).remove();
	$("span#fdel"+objId).remove();
	$("fieldset#dataSet span.br").last("span#fdel"+objId).remove();
		
}

//Choice 1
function createRadio(data){
    
        var countQ = $('input[name="question[]"]').length;
	var count = $('input[name="data'+countQ+'[]"]').length+1;      
	var number = count;
	
	var _radio = document.createElement("input");
	_radio.setAttribute("type","radio");
	_radio.setAttribute("name","_radio"+number);
	_radio.setAttribute("disabled","disabled");
	
	var _txtRadio = document.createElement("input");
	_txtRadio.setAttribute("type","text");
	_txtRadio.setAttribute("id","data"+number);
	_txtRadio.setAttribute("name","data"+countQ+"[]");
	_txtRadio.setAttribute("autocomplete","off");
	_txtRadio.setAttribute("placeholder","ระบุตัวเลือกที่ "+count);
	
	var a = addLink(data, _radio.getAttribute("name"), number);
	
	$("#areaQuest").append("<span class='br'><br /></span>");
	$("#areaQuest").append(_radio);
	$("#areaQuest").append(_txtRadio);
        $("#areaQuest").append(a);

}

//Choice 2
function createCheckbox(data){
   
	var countQ = $('input[name="question[]"]').length;
	var count = $('input[name="data'+countQ+'[]"]').length+1;      
	var number = count;
	
	var _checkbox = document.createElement("input");
	_checkbox.setAttribute("type","checkbox");
	_checkbox.setAttribute("name","_checkbox"+number);
	_checkbox.setAttribute("disabled","disabled");
	
	var _txtCheckbox = document.createElement("input");
	_txtCheckbox.setAttribute("id","data"+number);
	_txtCheckbox.setAttribute("type","text");
	_txtCheckbox.setAttribute("name","data"+countQ+"[]");
	_txtCheckbox.setAttribute("autocomplete","off");
	_txtCheckbox.setAttribute("placeholder","ระบุตัวเลือกที่ "+count);
	
	var a = addLink(data, _checkbox.getAttribute("name"), number);
	
	$("#areaQuest").append("<span class='br'><br /></span>");
	$("#areaQuest").append(_checkbox);
	$("#areaQuest").append(_txtCheckbox);
        $("#areaQuest").append(a);

}

//Choice 3
function createText(data){
    
        var countQ = $('input[name="question[]"]').length;
	var count = $('input[name="data'+countQ+'[]"]').length+1;      
	var number = count;
	
	var _txtText = document.createElement("input");
	_txtText.setAttribute("type","text");
	_txtText.setAttribute("id","data"+number);
	_txtText.setAttribute("name","data"+countQ+"[]");
	_txtText.setAttribute("readonly","readonly");
	_txtText.setAttribute("value","คำตอบของพวกเขา");
	
	var a = addLink(data, null, number);
	
	$("#areaQuest").append("<span class='br'><br /></span>");
	$("#areaQuest").append(_txtText);
        $("#areaQuest").append(a);

}

//Choice 4
function createScale(data){
	
	var countQ = $('input[name="question[]"]').length;
	var count = $('input[name="data'+countQ+'[]"]').length+1;      
	var number = count;
	
	var _spinner1 = '<select class="medium" style="width: 50px;" name="scale'+((countQ+1)*2)+'" id="multiSelect">';
        _spinner1+='<option>0</option>';
        _spinner1+='<option>1</option>';
        _spinner1+='</select>';
        
        var _to = "&nbsp;&nbsp;ไปยัง&nbsp;&nbsp;";
        
        var _spinner2 = '<select class="medium" style="width: 50px;" name="scale'+((countQ+2)*4)+'" id="multiSelect">';
        _spinner2+='<option>2</option>';
        _spinner2+='<option>3</option>';
        _spinner2+='<option>4</option>';
        _spinner2+='<option>5</option>';
        _spinner2+='<option>6</option>';
        _spinner2+='<option>7</option>';
        _spinner2+='<option>8</option>';
        _spinner2+='<option>9</option>';
        _spinner2+='<option>10</option>';
        _spinner2+='</select>';
	
	var _txtLabel1 = document.createElement("input");
	_txtLabel1.setAttribute("type","text");
	_txtLabel1.setAttribute("id","data"+number);
	_txtLabel1.setAttribute("name","_data"+((countQ+1)*2));
        _txtLabel1.setAttribute("style","width: 120px;");
	_txtLabel1.setAttribute("placeholder","ป้ายกำกับตัวเลือก");
	
        var _txtLabel2 = document.createElement("input");
	_txtLabel2.setAttribute("type","text");
	_txtLabel2.setAttribute("id","data"+number);
	_txtLabel2.setAttribute("name","_data"+((countQ+2)*4));
        _txtLabel2.setAttribute("style","width: 120px;");
	_txtLabel2.setAttribute("placeholder","ป้ายกำกับตัวเลือก");
        
        var _line1 = _spinner1+_to+_spinner2;
	
	$("#areaQuest").append("<span class='br'><br /></span>");
	$("#areaQuest").append(_spinner1);
	$("#areaQuest").append(_txtLabel1);
        $("#areaQuest").append(_to);
        $("#areaQuest").append(_spinner2);
        $("#areaQuest").append(_txtLabel2);


}

function createQuestion(){
    
    var count = $('input[name="question[]"]').length;
    
    var a='<br /><hr /><br />';
        a+='<label for="question">หัวข้อคำถาม/Question Title</label>';
        a+='<input type="text" id="question" name="question[]" autocomplete="off" placeholder="ยังไม่ได้ระบุหัวข้อ" />';

        a+='<br /><br />';

        a+='<label for="question">ประเภทคำถาม/Question Type</label>';
        a+='<select onChange="eventChange(this)" id="qType" name="qType'+count+'">';
                a+='<option value="0">--เลือกประเภท--</option>';
                a+='<option value="1">หลายตัวเลือก</option>';
                a+='<option value="2">ช่องทำเครื่องหมาย</option>';
                a+='<option value="3">ข้อความ</option>';
                a+='<option value="4">สเกลประมาณค่า</option>';
        a+='</select><br />';
                
        $("#areaQuest").append(a);
}

function eventChange(sel){
    //$(sel).change(function(){
		var choice = $(sel).val();
		if(choice==1){

//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
//			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
			$("span#fadd").first().remove();
			$("span[id^=fdel]").remove();
			aClick(choice);
			
		}else if(choice==2){

//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
//			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
			$("span#fadd").first().remove();
			$("span[id^=fdel]").remove();
			aClick(choice);
            
		}else if(choice==3){
			
//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
//			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
			$("span#fadd").first().remove();
			$("span[id^=fdel]").remove();
			aClick(choice);
            
		}else if(choice==4){
			
//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
//			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
			$("span#fadd").first().remove();
			$("span[id^=fdel]").remove();
			aClick(choice);
            
		}else{
			
//			$("fieldset#dataSet span.br").remove();
//			$('input[name="data[]"]').remove();
//			$('input[name!="question"]').remove();
//                        $('input').not("#pollTitle,#question,#agefrom1,#agefrom2,#agefrom3,#agefrom4,#agefrom5,#agefrom6").remove();
			$("span#fadd").first().remove();
			$("span[id^=fdel]").remove();
			aClick(choice);
			
		}
		
		
	//});
}