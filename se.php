<?php
$postdata = http_build_query(
    array(
        'coursestatus' => 'O00',
        'facultyid' => 'all',
         'maxrow' => '50',
          'acadyear' => '2560',
           'semester' => '1',
            'CAMPUSID' => '',
            'LEVELID' => '',
            'coursecode' => '',
            'coursename' => '',
                'cmd' => '2'
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('http://www.reg.sut.ac.th/registrar/class_info_1.asp?avs837810071=606&backto=home', false, $context);
print($result);
?>