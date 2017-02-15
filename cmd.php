<?php
if(isset($argv[1]))
{
	$arg = $argv[1];
	echo $arg;
	echo "\n";
	$json = file_get_contents("http://hnbex.eu/api/v1/rates/daily/?date=$arg");
}

if(!isset($argv[1]))
	$json = file_get_contents("http://hnbex.eu/api/v1/rates/daily/?date=YYYY-MM-DD");

$a = json_decode($json, true);
$size = count($a);

/*
for ($i=0; $i<$size; $i++)
{
	if(in_array("AUD", $a[$i]))
	{
		echo "Ima\n";
	}
	else
		echo "Nema\n";
}
*/

if(isset($argv[2]) && $argv[2]=='--force')
{
	for ($i=0; $i<$size; $i++)
	{
		echo $a[$i]['currency_code'];
		echo "\t";
		echo $a[$i]['unit_value'];
		echo "\t";
		$a[$i]['buying_rate'] = "-";
		echo $a[$i]['buying_rate'];
		echo "\t";
		$a[$i]['median_rate'] = "-";
		echo $a[$i]['median_rate'];
		echo "\t";
		$a[$i]['selling_rate'] = "-";
		echo $a[$i]['selling_rate'];
		echo "\n";
	}
}
else
{
	for ($i=0; $i<$size; $i++)
	{
		echo $a[$i]['currency_code'];
		echo "\t";
		echo $a[$i]['unit_value'];
		echo "\t";
		echo $a[$i]['buying_rate'];
		echo "\t";
		echo $a[$i]['median_rate'];
		echo "\t";
		echo $a[$i]['selling_rate'];
		echo "\t";
		echo "\n";
	}
}

?>