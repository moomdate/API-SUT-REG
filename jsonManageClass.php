<?php
class managejsonID {
	private $jsonPath;
	public function __construct($jsonPath_) {
		$this->jsonPath = $jsonPath_;
		//echo $this->jsonPath;
	}
	private function getjsonPath() {
		return $this->jsonPath;
	}
	public function addTojsonFile($key_, $value_) {
		$string = file_get_contents($this->getjsonPath());
		$json_a = json_decode($string, true);
		$json_a['courseid'][$key_] = $value_;
		$jsonData = json_encode($json_a);
		file_put_contents($this->getjsonPath(), $jsonData);
	}
	public function checkHashID($id_) {
		$string = file_get_contents($this->getjsonPath());
		$json_a = json_decode($string, true);
		if (!isset($json_a['courseid'][$id_])) {
			return 0;
		} else {
			return 1;
		}
	}
}
?>