#!/usr/bin/php
This is a test php in CLI

<?php 
	$file = fopen("usernames1.in", "r");
	$input = $argv[1];

	$num = array();

	if(preg_match("/([a-zA-Z]+)(\\d+)/", $input, $matches)) {
		$name = $matches[1];
		$pin = $matches[2];
	}
	elseif (preg_match("/([a-zA-Z]+)/", $input, $matches)) {
		$name = $matches[0];
		$pin = "";
	}

	while(!feof($file)) {
		$line = trim(fgets($file));

		if(preg_match("/".$name."/i", $line)) {
			if(preg_match("/(\\d+)/", $line, $matches)) {
				$num[] = $matches[1];	
				continue;			
			}
			$num[] = "";
		}
	}

	sort($num);
	var_dump($num);

	$recommended = $name."".recommend($num);

	echo $recommended;
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