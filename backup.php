<div id="remove">
  <div id="data" style="display:none">
    <?php

    $data___ =  $_GET['id'];
    $url__ = "http://www.reg.sut.ac.th/registrar/class_info_2.asp?backto=home&option=0&acadyear=2560&semester=1&courseid=";
    $url__ .=$data___;
    echo $url__;
    $translation = file_get_contents($url__);
    $data = iconv('TIS-620','UTF-8', $translation);
    $title = "API";

    //header('Content-Type: application/json');
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $data);

    print $buffer;

  ?>
</div>
<title>
  xx
</title>
<div id="jsonShow">
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript">
</script>
<script type="text/javascript">
  var header = Array();
  var Date_ = ["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์"];
  $("html body table tbody tr td table tbody tr td font").each(function(i, v){
    header[i] = $(this).text();
  })
  var tempDate;
  var group;
  var newGroup;
  var JsonFromReg ={};
  var groupsNumber ={};
  var group_array;
  var timeCount=0;
   var arrayLetters = {};

    document.getElementById("jsonShow").innerHTML = "";
    var arrayCout = 0;
    for(var i = 0; i < header.length;i++){
      tempDate = header[i];
      if(Date_.indexOf(tempDate)>-1){
       group = header[i-2].replace(/\s/g, "") ;

        if(isNormalInteger(group)){
          newGroup = 1;

         var data = [];
         JsonFromReg[group] ;
         arrayCout = 0;
           timeCount=0;
           console.log(arrayLetters);
            JsonFromReg[group_array] = arrayLetters;
           arrayLetters=[];
        //  console.log(header[i-2]);
      }
       if(newGroup==1){ //if new groups
           group_array =group;
        

        } 
       document.getElementById("jsonShow").innerHTML +="+++"+group_array +"+++";

       console.log(" :"+ tempDate + ":"+header[i+1]);

      console.log(timeCount + " " +group_array);
       arrayLetters[timeCount] = [tempDate,header[i+1] ];
       timeCount++;

      data.push(tempDate);


         data.push(header[i+1] );
       
        arrayCout++;

        newGroup=0;
      }
       console.log ("OK"); 


  } //end loop
   JsonFromReg[group_array] = arrayLetters; //ได้กลุ่มสุดท้าย
   console.log(arrayLetters); //ได้กลุ่มสุดท้าย


 function isNormalInteger(str) {
  return /^\+?\d+$/.test(str);
}


    delete JsonFromReg['undefined'];

</script>
</div>
<body style=" white-space: pre; font-family: monospace; ">
  <script type="text/javascript">
    document.body.innerHTML = "";
document.body.appendChild(document.createTextNode(JSON.stringify(JsonFromReg, null, 4)));
  </script>
  
</body>