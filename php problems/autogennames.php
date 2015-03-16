#!/usr/bin/php
<?php 
	const CAP = 50000;

	function generateUsername($names, $cache, $counts) {
		$username = "";
		$max = CAP/count($names);
		do{
			$name = $names[rand(0, 6)];

			if($max <= $counts[$name])
				continue;

			$username = $name."".rand(0, $max+($max/4));
		}
		while(in_array($username, $cache));

		return array(
			'USERNAME' => $username,
			'NAME'	   => $name,
		);
	}

	$names = array(
		"toper",
		"ferdi",
		"kurt",
		"karl",
		"daphne",
		"desiree",
		"julienne",
	);

	$cache = array();
	$counts = array();

	$file = fopen("usernames.in", "w");

	/*initialize all name count*/
	foreach ($names as $name) {
		$counts[$name] = 0;
	}

	$count = 0;
	while($count++ != CAP) {
		$un = generateUsername($names, $cache, $counts);
		$cache[] = $un['USERNAME'];

		$counts[$un['NAME']]++;

		fwrite($file, $un['USERNAME']."\n");
	}

	fclose($file);
 ?>