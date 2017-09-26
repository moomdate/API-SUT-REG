<?php

include('simple_html_dom.php');
echo "string";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$string = file_get_contents("courseid.json");
	$json_a = json_decode($string, true);
	$keyid = ($json_a['courseid'][$id]);
	$url = "http://www.reg.sut.ac.th/registrar/class_info_2.asp?backto=home&option=0&acadyear=2560&semester=1&courseid=".$keyid;
	$html = file_get_html($url);
/*
// find all link
foreach($html->find('a') as $e) 
    echo $e->href . '<br>';

// find all image
foreach($html->find('img') as $e)
    echo $e->src . '<br>';

// find all image with full tag
foreach($html->find('img') as $e)
    echo $e->outertext . '<br>';

// find all div tags with id=gbar
foreach($html->find('table tbody') as $e)
echo $e->plaintext . '<br>';*/
/*
// find all span tags with class=gb1
foreach($html->find('span.gb1') as $e)
    echo $e->outertext . '<br>';

// find all td tags with attribite align=center
foreach($html->find('td[align=center]') as $e)
    echo $e->innertext . '<br>'ว
    */
// extract text from table
    $data =  $html->find('table[cellpadding="2"]', 1)->plaintext.'<br><hr>';
//$output = preg_replace( '/[^0-9]/', '', $data );
$parts = preg_split('/\s+/', $data);// 
$data3 =  explode("&nbsp;&nbsp;",$data); //&nbsp;
// header('Content-Type: application/json');
//echo strpos($data,"02");
//echo "<pre>";
//print_r($data3);
//echo json_encode($data3);
//echo "</pre>";



//echo json_encode($data3);
$counter = 1;
$Myjson=[];
foreach ($data3  as $key => $value) {
	$Strsearch = (string)$counter."&nbsp;";
	if((int)$Strsearch<10)
		$Strsearch = "0".$Strsearch;

	//echo $Strsearch;
	if(strpos($value,$Strsearch) === false){

	}else{
		echo "เจอ  ";
		$counter++;
	}
	
	echo $value;
	echo "<br>";
	
}

echo "<br><hr>";
echo "groups: ";

echo $counter-1;
//echo "</pre>";
//echo strpos($data,"02");
//$data->find('font', 1)->innertext.'<br><hr>';
// extract text from HTML
//echo $html->plaintext;
}else{
	echo "not set id";
}

?>
