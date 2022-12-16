<?php

global $timer_debug, $client, $requests_amount;

$timer_debug->newEntry('calls');
for($i = 0; $i < $requests_amount; $i++) {
	$response = $client->getAsync('/advice')->wait();
	$timer_debug->nextEntry('calls');
}