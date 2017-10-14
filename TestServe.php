<?php
$url = ["reg.sut.ac.th","reg2.sut.ac.th","reg3.sut.ac.th","reg4.sut.ac.th","reg5.sut.ac.th","google.com"];
foreach ($url  as $key => $value) {
	$ch = curl_init($value); //get url http://www.xxxx.com/cru.php?url=http://www.example.com
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	if(curl_exec($ch))
	{
		$info = curl_getinfo($ch);
		echo 'Took ' . $info['total_time'] . ' seconds to transfer a request to ' . $info['url'].'<br>';
	}

	curl_close($ch);
}
?>