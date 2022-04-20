<?php
	ob_start();
	session_start();
	
	$string = 'if man was  meant to stay on the  ground god would have given us roots';
	// $string = 'have a nice day';
	$string = str_replace(" ", "", $string);
	$stringLength = strlen($string);
	
	
	$root= sqrt($stringLength);
    $row = floor($root);
    $column = ceil($root);
	
	$stringArray = str_split($string);
	
	$rowsCount = 0;
	$encryptedArray = [];
	foreach($stringArray as $individualCharacter){
		if($rowsCount <= $row){
			$encryptedArray[$rowsCount][] = $individualCharacter;
		}else{
			$rowsCount = 0;
			$encryptedArray[$rowsCount][] = $individualCharacter;
		}
		$rowsCount++;
	}
	
	foreach($encryptedArray as $enctryptedMessageArray){
		echo implode("", $enctryptedMessageArray)." ";
	}
?>