<?php

use Core\TimerDebug;
use GuzzleHttp\Client;

include_once './vendor/autoload.php';
 

$base_uri = 'https://api.adviceslip.com';
$requests_amount = 20;
 
$client = new Client([
	'base_uri' => $base_uri,
	'headers' => [
		'content-type' => 'application/json'
	]
]);

$timer_debug = new TimerDebug;
$timer_debug->newEntry('http');

if($argv[1] === '-s') {
	printf("NORMAL\n");
	include 'sequential.php';
} elseif($argv[1] === '-c') {
	printf("\n\n\nCONCORRENTE\n");
	include 'concurrency.php';
} else {
	printf("NORMAL\n");
	include 'sequential.php';
	
	printf("\n\n\nCONCORRENTE\n");
	include 'concurrency.php';
}
