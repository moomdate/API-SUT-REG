<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
set_error_handler('exceptions_error_handler');
function findCourseID($id_, $semester_, $url_, $year_) {

	$request = array(
		'http' => array(
			'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
			'method' => 'POST',
			'content' => http_build_query(array(
				'coursestatus' => 'O00',
				'facultyid' => 'all',
				'maxrow' => '50',
				'acadyear' => $year_,
				'semester' => $semester_,
				'CAMPUSID' => '',
				'LEVELID' => '',
				'coursecode' => $id_,
				'coursename' => '',
				'cmd' => '2',
			)),
		),
	);

	$context = stream_context_create($request);

	$html = file_get_html($url_, false, $context);
	$data2 = $html->find('font[size=2]', 0);
	$fillter = explode('?', $data2);
	try {
		if (preg_match('/courseid=\d+/', $fillter[1], $matches, PREG_OFFSET_CAPTURE)) {
			$courseid = explode('=', $matches[0][0]);
			//echo $courseid[1];
			if (isset($courseid[1])) {
				return $courseid[1];
			} else {
				return 0;
			}
		}
	} catch (Exception $e) {
		return 0;
	}
}
function exceptions_error_handler($severity, $message, $filename, $lineno) {
	if (error_reporting() == 0) {
		return;
	}
	if (error_reporting() & $severity) {
		throw new ErrorException($message, 0, $severity, $filename, $lineno);
	}
}
include "jsonManageClass.php";
include "Lib/simple_html_dom.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = '';
}

if (isset($_GET['y'])) {
	$year = $_GET['y'];
} else {
	$year = '2560';
}
$arr = array(
	'status' => '',
	'code' => 0,
);
$baseURL = "https://reg4.sut.ac.th/registrar/class_info_1.asp?avs1045002924=2&backto=home";
$jsonMN = new managejsonID("Data/courseid.json");
if ($jsonMN->checkHashID($id)) {
	$arr['status'] = 'has in table';
	$arr['code'] = 2;

	$myJSON = json_encode($arr);
	echo $myJSON;
} else {
	for ($i = 1; $i <= 3; $i++) {
		$data___ = findCourseID($id, $i, $baseURL, $year);
		if ($data___ != 0) {
			$jsonMN->addTojsonFile($id, $data___);
			$arr['status'] = 'success';
			$arr['code'] = 1;
			$arr['coursecode'] = $data___;
			$arr['courseid'] = $id;
			$myJSON = json_encode($arr);
			$error = 0;
			echo $myJSON;
			break;
		} else {
			$error = 1;
		}
	}
	if ($error == 1) {
		$arr['status'] = 'not found course id';
		$arr['code'] = 0;
		$myJSON = json_encode($arr);
		echo $myJSON;
	}
	//
}

?>