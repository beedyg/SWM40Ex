<?php 

/**
 * Define the Grammar
 */
$accept = array(NULL,'a','b');

$rules = array(
			array(1,'a',2),
			array(2,'a',3),
			array(3,'a',3),
			array(1,'b',3),
			array(2,'b',1),
			array(3,'b',3),
		);

$start = 1;
$ok_tofinish = 1;

/**
 * Process the input
 */
$tape = str_split($_GET['tape']);
var_dump($tape);
$c_state = $start;

echo '<hr />';
//change the c_state depending on a valid rule
//get the next symbol
$invalid = FALSE;
do{
	$symbol = array_shift($tape);
	if(in_array($symbol, $accept)){
		echo "symbol is = '{$symbol}' state = {$c_state}<br />";
		foreach($rules as $rule){
			if($rule[0] == $c_state && $rule[1] == $symbol){
				$c_state = $rule[2];
				break;
			}
		}
	} else {
		$invalid = TRUE;
	}
} while(!$invalid && $symbol != NULL);

if(!$invalid && $c_state === $ok_tofinish){
	echo 'Yes - is valid';
} else {
	echo 'No it not valid';
}


?>