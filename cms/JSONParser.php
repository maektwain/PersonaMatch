<?php
/*$string = file_get_contents("jsonFile.json");

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($string, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

/* foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "THE KEY : $key:\n";
    } else {
        echo "THE KEY VALUE CHANGE : $key => $val\n";
    }
	
	echo "<br/>";
} 

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
    	if($key != 0){
    		echo "THE KEY : $key:\n";
    	}
        
    } else {
        echo "THE KEY VALUE CHANGE : $key => $val\n";
    }
	
	echo "<br/>";
} */


$str = file_get_contents('jsonFile.json');
$json = json_decode($str, true);
//echo '<pre>' . print_r($json, true) . '</pre>';

foreach ($json as $key => $value){
	if($key > 0){
		echo 'KEY : ' . $key;
		echo '<br/>&nbsp;&nbsp;&nbsp;VALUE : <br/>';
		foreach($value as $key1 => $value1){
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KEY1 : ' . $key1;
			if($key1 == 'url'){
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $value1;
			}
			else if($key1 == '_type'){
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $value1;
			}
			else if($key1 == '_template'){
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $value1;
			}
			else{
				foreach($value1 as $key2 => $value2){
					echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KEY2 : ' . $key2;
					echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ' . $value2;
				}
			}
			
			echo '<br/>';
		}
		echo '<br/><br/><br/><br/>';
	}
}

/*foreach ($json as $key => $value){
	if($key > 0){
		foreach($value as $key1 => $value1){
			if($key1 == 'bike_name'){
				foreach($value1 as $key2 => $value2){
					$brandName = explode(" ", $value2);
					echo $brandName[0];
					echo '<br/><br/>';
				}
			}
		}
	}
}*/
?>