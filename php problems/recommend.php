#!/usr/bin/php
This is a test php in CLI

<?php 
	$file = fopen("elimination-100k.in", "r");
	$input = $argv[1];

	$num = array();
	$registered = array();

	if(preg_match("/([a-zA-Z]+)(\\d+)/", $input, $matches)) {
		$name = $matches[1];
		$pin = $matches[2];
	}
	elseif (preg_match("/([a-zA-Z]+)/", $input, $matches)) {
		$name = $matches[0];
		$pin = "";
	}
	else
		$name = $input;

	while(!feof($file)) {
		$line = trim(fgets($file));

		if(preg_match("/".$name."/i", $line)) {
			$registered[] = $line;
			if(preg_match("/(\\d+)/", $line, $matches)) {
				$num[] = $matches[1];	
				continue;			
			}
			$num[] = "";
		}
	}
	sort($num);
	sort($registered);
	
	if($num) {
		echo "Registered: \n".implode("\n", $registered)."\n";
	}

	$recommended = $name."".recommend($num);

	echo "Input: ".$input."\n";
	echo "Recommended: ".$recommended."\n";
	fclose($file);

	function recommend(array $num){
		$start = "";
		$ctr = 0;
		while(in_array("".$start, $num)){
			if($start == "") {
				$start = $ctr."";
				continue;
			}
			$start = ++$ctr."";
		}
		return $start;
	}
 ?>