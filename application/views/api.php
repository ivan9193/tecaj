<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8"/>
</head>

<body>

<?php

set_time_limit(0);

$valuta = $_POST["valuta"];
$datum1 = $_POST["datum1"];
$datum2 = $_POST["datum2"];
$json = file_get_contents("http://hnbex.eu/api/v1/rates/daily/?date=YYYY-MM-DD");
$a = json_decode($json, true);
$size = count($a);

for ($i=0; $i<$size; $i++)
{
	if(in_array(strtoupper($valuta), $a[$i]))
	{
		?>
		
		<table border="1">
			<tr>
				<th>Currency Code</th>
				<th>Unit Value</th>
				<th>Buying Rate</th>
				<th>Median Rate</th>
				<th>Selling Rate</th>
				<th>Date</th>
				<th></th>
			</tr>
			<tr>
			<?php
			
				for ($j=strtotime($datum1); $j<=strtotime($datum2); $j=strtotime("+1 day", $j))
				{
					$datum = date ("Y-m-d", $j);
					$json = file_get_contents("http://hnbex.eu/api/v1/rates/daily/?date=$datum");
					$a = json_decode($json, true);
					$size = count($a);
			
			?>
				<td><input type="hidden" name="<?php echo $a[$i]['currency_code']; ?>" value="<?php echo $a[$i]['currency_code']; ?>"/><?php echo $a[$i]['currency_code']; ?></td>
				<td><?php echo $a[$i]['unit_value']; ?></td>
				<td><?php echo $a[$i]['buying_rate']; ?></td>
				<td><?php echo $a[$i]['median_rate']; ?></td>
				<td><?php echo $a[$i]['selling_rate']; ?></td>
				<td><?php echo date ("Y-m-d", $j); ?></td>
				<td><a href="db?cc=<?php echo $a[$i]['currency_code']; ?>&br=<?php echo $a[$i]['buying_rate']; ?>&mr=<?php echo $a[$i]['median_rate']; ?>&sr=<?php echo $a[$i]['selling_rate']; ?>&date=<?php echo date ("Y-m-d", $j); ?>"><button name="<?php echo date ('Y-m-d', $j); ?>">Save</button></a></td>
			</tr>
			
			<?php
			
				}
				
			?>	
		</table>
		<?php
	}
}

?>
	
</body>

</html>