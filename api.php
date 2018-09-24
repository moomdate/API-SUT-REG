<?php
/*
can use
$nuykit
$nameCourse
$amount
$type
$amout
$Bulding
$room
 */
header("Access-Control-Allow-Origin: *");

include "Lib/simple_html_dom.php";
$Date_ = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
if (isset($_GET['serve'])) {
	if ($_GET['serve'] > 6) {
		$serve = "";
	} else {
		$serve = $_GET['serve'];
	}

} else {
	$serve = "";
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$string = file_get_contents("Data/courseid.json");
	$json_a = json_decode($string, true);
	$keyid = ($json_a['courseid'][$id]);
	if (isset($_GET['acadyear'])) {
		$acadyear = $_GET['acadyear'];
	} else {
		$acadyear = '2560';
	}

	if (isset($_GET['semester'])) {
		$semester = $_GET['semester'];
	} else {
		$semester = '1';
	}

	$url = "http://reg" . $serve . ".sut.ac.th/registrar/class_info_2.asp?backto=home&option=0&acadyear=" . $acadyear . "&semester=" . $semester . "&courseid=" . $keyid;
	$html = file_get_html($url);
	$myArray = array();
	$groups = array();
	$group = array();
	$details = array();
	//$Name__  = array();
	//array_push($myArray, )
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
*/
/*
// find all span tags with class=gb1
foreach($html->find('span.gb1') as $e)
echo $e->outertext . '<br>';

// find all td tags with attribite align=center
foreach($html->find('td[align=center]') as $e)
echo $e->innertext . '<br>'ว
 */
// extract text from table
	$data = $html->find('table[cellpadding="2"]', 1)->plaintext . '';
	$data2 = $html->find('font', 1)->plaintext . '';
	$indexNum = strpos($data2, "หน่วยกิต") + 27;
	$nuykit = substr($data2, $indexNum - 3, 30);

	$indexOfEndN = 0;
	for ($i = 0; $i < 30; $i++) {
		if ($nuykit[$i] == ")") {
			$indexOfEndN = $i;
			break;
		}
	}
	$nuykit = substr($nuykit, 0, $indexOfEndN + 1);
	$indexOfEnd = 0;
	$data2Length = strlen($data2);
	for ($i = 0; $i < $data2Length; $i++) {
		if ($data2[$i] == "<") {
			$indexOfEnd = $i;
			break;
		}
		//echo $data2[$i];
	}
	$nameCourse = substr($data2, 0, $indexOfEnd);
	$myArray['Name'] = $nameCourse;

	//  echo "วิชา: ".$nameCourse."<br>";
	// echo "หน่วยกิต: ".$nuykit."<br>";
	//  $nnnn = array('Credit' => $nuykit);
	$myArray['Credit'] = $nuykit;
	//array_push($myArray, $nnnn);
	//print(mb_detect_encoding ($data2[19]));
	//$output = preg_replace( '/[^0-9]/', '', $data );
	$parts = preg_split('/\s+/', $data); //
	$data3 = explode("&nbsp;&nbsp;", $data); //&nbsp;
	header('Content-Type: application/json');
//echo strpos($data,"02");
	//echo "<pre>";
	//print_r($data3);
	//echo json_encode($data3);
	//echo "</pre>";

//echo json_encode($data3);
	$counter = 1;
	$Myjson = array();
	$befor = 0;
	$change = false;
	$countTime = 1;
	$countForEnd = 0;
	$endEven = 0;
	$resetGroup = 0;
	foreach ($data3 as $key => $value) {

		$Strsearch = (string) $counter . "&nbsp;";
		if ((int) $Strsearch < 10) {
			$Strsearch = "0" . $Strsearch;
		}

		//echo $Strsearch;
		if (strpos($value, $Strsearch) === false) {

		} else {
			//echo "กลุ่ม:  ";
			//$aaaccc = array($counter => "");
			//array_push($a,"blue","yellow");
			//array_push($groups, $aaaccc);
			$dataIngroups = array();
			//$groups[$counter] = $dataIngroups;

			//array_push($group, $dataIngroups[$countTime]);
			$counter++;

			$countTime = 1;

		}

		$map_ = 0;
		for ($i = 0; $i < 7; $i++) {
			//get date
			$data_dot = $Date_[$i];
			if (strpos($value, $data_dot) === false) {
				//echo "string";
			} else {
				$data_dot2 = $Date_[$i] . " ";

				if (strpos($value, $data_dot2) === false) {
					//echo "string";
				} else {
					$map_++;
					//echo "เจอวัน xxxx"; ถ้าเจออันทีี่ไม่ใช่เวลาเรียน
				}
				$map_++;
				//	echo "<br>";

				// echo "เจอวัน ----";
			}
			if ($map_ == 1) {
				//ถ้าเป็นวันที่เรียน map_ จะเท่ากับ 1++
				//$dataIngroups[$countTime] = "xxx";

				if (strpos($value, $data_dot) > 30) {
					//detech found in date

				} else {

					if ($befor == $counter) {
						// first group
						$dataIngroups[$countTime]['Date'] = $Date_[$i]; //ad date to array
						//echo "<br>เรียนวัน ".$Date_[$i];
						//echo "<br>";
						//echo  strlen($Date_[$i]);
						//echo "เวลา:";
						$time__ = substr($value, (strlen($Date_[$i])), 11);
						$dataIngroups[$countTime]['Time'] = $time__; //add time to array
						$detalNonesub = substr($value, (strlen($Date_[$i])) + 11, 50);
						//echo "<br>";
						//echo $detalNonesub;
						//echo "<br>";
						$howlon = 0;
						for ($gg = strlen($detalNonesub) - 2; $gg >= 0; $gg--) {
							//check tyoe
							//echo $detalNonesub[$gg];
							if (ctype_alpha($detalNonesub[$gg])) {
								$howlon = $gg;
								break;
							}
						}
						$howlon2 = 0;
						for ($lop = $howlon - 1; $lop >= 0; $lop--) {
							//check building
							//echo $detalNonesub[$lop];
							if (ctype_alpha($detalNonesub[$lop])) {
								$howlon2 = $lop;
								break;
							}
						}
						//echo "ห้อง:";
						$room = substr($detalNonesub, 0, $howlon2 + 2);
						$dataIngroups[$countTime]['Room'] = $room; // add room to array
						//echo "<br>";
						//echo $howlon;
						//echo "อาคาร:"; //bug
						//echo $howlon2;
						$Bulding = substr($detalNonesub, $howlon, (strlen($detalNonesub) - ($howlon + 1)));
						$dataIngroups[$countTime]['Building'] = $Bulding; // add Bulding to array
						$Bulding;

						//echo $howlon;

					} else {
						$countForEnd++;
						$dataIngroups[$countTime]['Date'] = $Date_[$i];
						//echo "<br>เรียนวัน ".$Date_[$i];
						//echo "<br>";
						//echo  strlen($Date_[$i]);

						//echo "เวลา:";
						$time_2 = substr($value, strlen($Date_[$i]) + 8, 11); //(strlen($Date_[$i]+20))
						$dataIngroups[$countTime]['Time'] = $time_2;
						//echo strlen($Date_[$i])+8;
						//echo "--*--"; // detail
						$detalNonesub = substr($value, strlen($Date_[$i]) + 8 + 11, 50);
						//echo $detalNonesub;
						//echo "<br>";
						$howlon = 0;
						for ($gg = strlen($detalNonesub) - 2; $gg >= 0; $gg--) {
							//check tyoe
							//echo $detalNonesub[$gg];
							if (ctype_alpha($detalNonesub[$gg])) {
								$howlon = $gg;
								break;
							}
						}
						$howlon2 = 0;
						for ($lop = $howlon - 1; $lop >= 0; $lop--) {
							//check building
							// $detalNonesub[$lop];
							if (ctype_alpha($detalNonesub[$lop])) {
								$howlon2 = $lop;
								break;
							}
						}

						//echo $detalNonesub[$howlon2];
						//echo "ห้อง:";
						$room = substr($detalNonesub, 0, $howlon2);
						$dataIngroups[$countTime]['Room'] = $room; // add room to array
						//echo "<br>";
						//echo $howlon2;
						//echo "อาคาร:";
						$Bulding = substr($detalNonesub, $howlon2, $howlon - $howlon2);
						$dataIngroups[$countTime]['Building'] = $Bulding; // add Building to array
						//echo $Bulding;
						//echo "<br>";
						//echo $howlon;
						//echo "==";
						//echo $howlon;
						//echo $detalNonesub[7+1];
						$type = substr($detalNonesub, strlen($detalNonesub) - 1, strlen($detalNonesub));
						$amount = substr($detalNonesub, $howlon + 1, strlen($detalNonesub) - ($howlon + 2));
						//echo "<br>จำนวน:";
						//echo $amount;
						// echo ctype_alpha("9"); is char
						//echo "==";

					}

					$befor = $counter;
					array_push($group, $dataIngroups[$countTime]); // groups 3 อัน
					//echo "<br>";
					$countTime++;
					//echo $countTime;
					// check end groups
				}
			}
			$map_ = 0;
			//echo $countTime;
			//echo $countTime;
			/////////////////get time/

		} // end get date
		//echo $counter;

		if (strpos($value, "อาจารย์") === false) {

		} else {

			//echo "end Groups<br>";
			// echo $value;
			$groups[$counter - 1] = $group;
			$groups[$counter - 1]["Detail"] = $value;
			$group = array();
		}
		//echo $details[$counter-1]  = $value;

		//echo "xxxxxxxxxxxxxxxx";
		//echo "<br>";

	}

//echo "groups: ";

//echo $counter-1;
	//echo "</pre>";
	//echo strpos($data,"02");
	//$data->find('font', 1)->innertext.'<br><hr>';
	// extract text from HTML
	//echo $html->plaintext;
} else {
//	echo "not set id";
}
$myArray['Groups'] = $groups;
echo json_encode($myArray);
//echo $serve;
?>
