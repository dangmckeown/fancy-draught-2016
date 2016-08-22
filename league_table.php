<?php

function league_table($managers){

$league = array();
// Populate array
foreach ($managers as $man){
$league[] = array('Score'=>get_score($man),'Manager'=>$man['Name']);
}
//Sort score high-low

arsort($league);

$total = 0;
?>

<center><b>Standings</b><table><?php
foreach ($league as $l){
	echo "<tr><td>";
	echo $l['Manager'] . "</td><td>" . $l['Score'];
	$total += $l['Score'];
	echo "</td></tr>";
}
?>
</table></center>
<?php
if ($total <= 0){
// error message
echo "<p style='font-color:red;'>There is a problem getting player data at the moment. Check again later!</p>";
}
}

?>
