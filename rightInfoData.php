<?php

require_once 'data.inc.php';

$hron = -(mktime($hour, 0, 0, $month, $day, $year) - time());

echo json_encode(
	array(
		'watch'  => $hron,
	)
);

die;