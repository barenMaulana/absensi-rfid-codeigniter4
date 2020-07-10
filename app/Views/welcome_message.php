<?php
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d');
$time = date('H');
$end = date('H', time() + 60 * 60);

if ($time === $end) {
	echo "true";
} else {
	echo "false";
}
d($end);
dd($time);
