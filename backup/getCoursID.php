  <title>xx</title>

      <div id="jsonShow">

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
       var newGroup;
  	//console.log(header[29]);
    document.getElementById("jsonShow").innerHTML = "{<br>";
    var arrayCout = 0;
    for(var i = 0; i < header.length;i++){
      tempDate = header[i];

      if(Date_.indexOf(tempDate)>-1){
       group = header[i-2].replace(/\s/g, "") ;
  			//console.log(isNormalInteger(group));
  			if(isNormalInteger(group)){
          newGroup = 1;
          if(arrayCout!=0){
           document.getElementById("jsonShow").innerHTML +="],<br>";
         }
         document.getElementById("jsonShow").innerHTML += "\""+ group +"\":[{<br>"; //get groups
         <?php
            array_push($arrayGroup, );
         ?>
         arrayCout = 0;
  			//	console.log(header[i-2]);
     }
			 // document.getElementById("jsonShow").innerHTML +=",<br>";
      console.log(" :"+ tempDate + ":"+header[i+1]);
      document.getElementById("jsonShow").innerHTML+= "\"date\":" + "\"" +tempDate + "\","; //get date
			  //+ header[i+1] + "--" + arrayCout; 
        document.getElementById("jsonShow").innerHTML+= "<br>\"time\":" + "\"" +header[i+1] + "\"" + "<br>}"; //get time
        if(newGroup==1){ //if new groups
          document.getElementById("jsonShow").innerHTML+=",<br>{";
        }
        arrayCout++;
        newGroup=0;
      }
		//  document.getElementById("jsonShow").innerHTML+=",";
 }
 document.getElementById("jsonShow").innerHTML+="]}"; 
 strip();
 function isNormalInteger(str) {
  return /^\+?\d+$/.test(str);
}
function strip(html)
{
 var tmp = document.createElement("DIV");
 tmp.innerHTML = html;
 return tmp.textContent || tmp.innerText || "";
}

	//console.log(tempDate); //26 42 --19 record 22
</script>
<?php
/* get รหัสวิชาจากหน้าคนหาตารางเรียน
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
*/
?>
