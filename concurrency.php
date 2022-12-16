<?php

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Response;

global $timer_debug, $client, $requests_amount;
	
$timer_debug->newEntry('calls');

$promises = [];

for($i = 0; $i < $requests_amount; $i++) {
	$promises[] = function() {
		global $client;
		return $client->getAsync('/advice');
	};
}

$timer_debug->nextEntry('calls');

/* // Envia todas juntas ao memsmo tempo
$responses = \GuzzleHttp\Promise\Utils::settle(
	$promises
)->wait();
*/

 // Uso de Pools, permite customizar a quantidade de concorrências. Bom para não sobrecarregar o servidor que receberá as requisições
$pool = new Pool($client, $promises, [
	'concurrency' => $requests_amount,
	'fulfilled' => function (Response $response, $index) {
        echo $response->getBody();
    },
    'rejected' => function (RequestException $reason, $index) {
        echo 'Falho...';
    }
]);

$promise = $pool->promise();
$promise->wait();

$timer_debug->nextEntry('calls');
