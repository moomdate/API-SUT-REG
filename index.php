<div style=" display: none">
	<?php
	$data___ =  $_GET['id'];
	$url__ = "http://www.reg.sut.ac.th/registrar/class_info_2.asp?backto=home&option=0&acadyear=2560&semester=1&courseid=";
	$url__ .=$data___;
	echo $url__;
	$translation = file_get_contents($url__);
	$data = iconv('TIS-620','UTF-8', $translation);
	print $data;
/*unction file_get_contents_utf8($fn) {
     $content = file_get_contents($fn);
      return mb_convert_encoding($content, 'UTF-8',
          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
      }*/
      ?>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript">
  	var header = Array();
  	var Date_ = ["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์"];
  	$("html body table tbody tr td table tbody tr td font").each(function(i, v){
  		header[i] = $(this).text();
  	})
  	var tempDate;
  	var group;
  	//console.log(header[29]);
  	for(var i = 0; i < header.length;i++){
  		tempDate = header[i];

  		if(Date_.indexOf(tempDate)>-1){
  			group = header[i-2].replace(/\s/g, "") ;
  			//console.log(isNormalInteger(group));
  			if(isNormalInteger(group)){
  				console.log(header[i-2]);
  			}
  			console.log(" :"+ tempDate + ":"+header[i+1]);
  			
  		}
  	}
  	function isNormalInteger(str) {
  		return /^\+?\d+$/.test(str);
  	}
	//console.log(tempDate); //26 42 --19 record 22
</script>
var header = Array();
var jsonData = {};
$("html body table tbody tr td table tbody tr td font a").each(function(i, v){
header[i] = $(this).attr("href");
})
for(var i = 0; i < header.length; i++){
var data =  header[i];
var courseId = data.split("=")[3].split("&")[0]
var courseCode= data.split("=")[4].split("&")[0];
//var courseId = data.split("a");
if(courseCode.length>3){
jsonData[courseCode]=courseId;
}
//console.log(courseId + " : " + courseCode); 
}
console.log(jsonData);


