<?php
	ob_start();
	session_start();
	
	function checkPalindrome($string) {
		$string = strtolower($string);
		return $string == strrev($string);
	}

	$string = 'abcdefAnnaRacecarMom';
	$string = str_replace(" ", "", $string);
	$length = strlen($string);
	
	$palindromeArray = [];
	for($i = 0; $i < $length; $i++){
		for($j = $length - $i; $j > 1; $j--){
			if(checkPalindrome(substr($string, $i, $j))){
				$palindromeString = substr($string, $i, $j);
				$palindromeArray[] = $palindromeString;
			}
		}
	}
	
	if(count($palindromeArray) != 0){
		$totalPalindromesArray = [];
		foreach($palindromeArray as $individualString){
			$addString = 0;
			foreach($palindromeArray as $individualString1){
				if($individualString != $individualString1){
					$checkExists = strripos($individualString1, $individualString);
					if($checkExists != 0){
						$addString = 1;
					}
				}
			}
			if($addString == 0){
				$totalPalindromesArray[] = array("name" => $individualString, "length" => strlen($individualString));
			}
		}
		
		function sortByOrder($a, $b){
			return $b['length'] - $a['length'];
		}
		
		usort($totalPalindromesArray, 'sortByOrder');
		
		$finalPalindromeText = "";
		$finalPalindromeArray = [];
		foreach($totalPalindromesArray as $finalTextData){
			$finalPalindromeArray[] = $finalTextData["name"]." (".$finalTextData["length"].")";
		}
		
		$finalPalindromeText = implode(", ", $finalPalindromeArray);
		
		echo "The palindromes are ".$finalPalindromeText.". The maximum product is ".$totalPalindromesArray[0]["name"]." - ".$totalPalindromesArray[0]["length"].", ".$totalPalindromesArray[1]["name"]." - ".$totalPalindromesArray[1]["length"]." = ".$totalPalindromesArray[0]["length"]."*".$totalPalindromesArray[1]["length"]." = ".$totalPalindromesArray[0]["length"]*$totalPalindromesArray[1]["length"];
	}else{
		echo "Not a Valid Palindrome";
	}
?>