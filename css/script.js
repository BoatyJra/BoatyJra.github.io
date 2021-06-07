

function box_mess1(){
	//document.getElementById("box_mess").innerHTML="บันทึกข้อมูลเรียบร้อยแล้วครับ";
	document.getElementById("body_msg_div1").style.display="block";
	set_time=setInterval("box_mess0()",5000);
}
function box_mess2(){
	
	document.getElementById("body_msg_div2").style.display="block";
	set_time=setInterval("box_mess0()",5000);
}
function box_mess3(){
	document.getElementById("body_msg_div3").style.display="block";
}
function box_mess0(){
	document.getElementById("body_msg_div1").style.display="none";
	document.getElementById("body_msg_div2").style.display="none";
}

	
function rere(){
	window.top.location.reload();
	
}

function send_f(){
	document.f_box.submit();
}