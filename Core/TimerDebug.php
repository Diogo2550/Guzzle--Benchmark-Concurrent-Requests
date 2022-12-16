<?php

namespace Core;

class TimerDebug {
	
	private array $entries;
	
	public function __construct() {
		$this->entries = [];
	}
	
	public function newEntry(string $entry_name) {
		$this->entries[$entry_name] = microtime(true);
	}
	
	public function resetEntry(string $entry_name) {
		$this->entries[$entry_name] = microtime(true);
	}
	
	public function nextEntry(string $entry_name) {
		$time_offset = (microtime(true) - $this->entries[$entry_name]);
		printf("Entry %s: %f\n", $entry_name, $time_offset);
		
		$this->entries[$entry_name] = microtime(true);
	}
	
}