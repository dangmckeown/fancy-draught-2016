<?php


function bench_players($manager){

$pitch = assign_scores($manager);
// Won't work if assign_scores hasn't been run

$bench = array();
$outfielders = array();
$min = "Default name";
$goalie = "Massimo Taibi";
$min_score = 20000;

// Goalies first

foreach($pitch['Goalkeepers'] as $gk){
	if ($gk[2] < $min_score){
	$min_score = $gk[2];
	$min = $gk;
	}
}

// Bench one and put the other goalie somewhere safe

foreach($pitch['Goalkeepers'] as $gk){
	if ($gk == $min){
	$bench[] = $gk;
	}
	else
	{
	$goalie = $gk;
	}
}

// Put remaining players into $outfield array

foreach($pitch['Defenders'] as $df){
	$outfielders[] = $df;
}
foreach($pitch['Midfielders'] as $md){
	$outfielders[] = $md;
}
foreach($pitch['Forwards'] as $fw){
	$outfielders[] = $fw;
}

// Boot the three least worthy hackers out of the $outfielders array and put them on the bench
//bench three outfield players

for($i=1;$i<=3;$i++){
$sub = get_min($outfielders);
$bench[] = $sub;  
$key = array_search($sub, $outfielders);
unset($outfielders[$key]);
}//end for

return $bench;

} // end function bench_players 

//================================================================================================

?>
