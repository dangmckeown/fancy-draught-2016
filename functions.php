<?php

/*
* Functions *******************************************
*
* get_min = from original app, takes lowest scoring players from array
* assign_scores = assigns score to each player in a team
* bench_players = filters out lowest scorers
* starting_eleven = selects highest scoring 11 (inc one goalie)
*
*/

function get_min($array){
  $min=array('Name' => "Default value",2 => 20000);
  foreach ($array as $arr){

    if ($arr[2] < $min[2]){
      $min = $arr;
    }//end if

  } //end foreach
  return $min;
} //end get_min()

//=====================================================================================


function assign_scores($manager){

// Initialise squad array to return from function...

$squad = array();
$squad['Name'] = $manager['Name'];
$squad['Team'] = $manager['Team'];



global $players;
// Cross reference scores for each player

$playertypes = (['Goalkeepers','Defenders','Midfielders','Forwards']);

foreach ($playertypes as $pt){

$p = rtrim($pt,'s');

foreach ($manager[$pt] as $gk){
$gk[2] = "0";
	foreach($players as $player){
	if ($player[0] == $p && $player[1] == $gk[0] && $player[2] == $gk[1] ){
		$gk[2] = $player[3];
	} //end if
	} //end foreach $players

$squad[$pt][] = $gk;

} //end foreach $gk

} // end foreach $pt

return $squad;

}//end function assign_scores

//===========================================================================

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



/*

for ($i = 1; $i <=3; $i++){

$min_score = 20000;

$min = "Jason Lee";

foreach ($outfielders as $of){

if ($of[2] < $min_score){
$min_score = $of[2];
$min = $of;
$of[2] = 20000;

}	//end if

}	//end foreach $of

$bench[] = $min;

var_dump($goalie);

} // end 3-time cycle
*/

return $bench;

} // end function bench_players 

//================================================================================================

function starting_eleven($manager){

//score =

$score = 0; 

$squad = assign_scores($manager);
$bench = bench_players($manager);
 # var_dump($bench);
$eleven = array();

$playertypes = (['Goalkeepers','Defenders','Midfielders','Forwards']);

foreach($squad['Goalkeepers'] as $sq){
#var_dump($sq);

foreach ($bench as $ben){
if($sq[0]==$ben[0] && $sq[1] == $ben[1] && $sq[2] == $ben[2]){
continue 2;
}
}
$score += $sq[2];
$eleven['Goalkeepers'][] = $sq; 
# var_dump($eleven);
} //end goalie filter

foreach($squad['Defenders'] as $sq){
#var_dump($sq);

foreach ($bench as $ben){
if($sq[0]==$ben[0] && $sq[1] == $ben[1] && $sq[2] == $ben[2]){
continue 2;
}
}
$score += $sq[2];
$eleven['Defenders'][] = $sq; 
}

foreach($squad['Midfielders'] as $sq){
#var_dump($sq);

foreach ($bench as $ben){
if($sq[0]==$ben[0] && $sq[1] == $ben[1] && $sq[2] == $ben[2]){
continue 2;
}
}
$score += $sq[2];
$eleven['Midfielders'][] = $sq; 
}

foreach($squad['Forwards'] as $sq){
#var_dump($sq);

foreach ($bench as $ben){
if($sq[0]==$ben[0] && $sq[1] == $ben[1] && $sq[2] == $ben[2]){
continue 2;
}
}
$score += $sq[2];
$eleven['Forwards'][] = $sq; 
}

// Eleven now selected: lay them out on pitch

echo "<h1>" . $manager['Team'] . "</h1>";
echo "<p>" . $manager['Name'] . "</p>";
echo "<p>";
foreach($eleven['Goalkeepers'] as $el){
echo $el[0] . " (Goalkeeper, " . $el[1] . ", " . $el[2] . " points)";
}
echo "<br />";

foreach($eleven['Defenders'] as $el){
echo $el[0] . " (Defender, " . $el[1] . ", " . $el[2] . " points) ";
}
echo "<br />";

foreach($eleven['Midfielders'] as $el){
echo $el[0] . " (Midfielder, " . $el[1] . ", " . $el[2] . " points) ";
}
echo "<br />";


foreach($eleven['Forwards'] as $el){
echo $el[0] . " (Forward, " . $el[1] . ", " . $el[2] . " points) ";
}
echo "</p>";
echo "<p>";

echo "<b>Total score: $score</b>";

echo "<br />";

echo "<sub>Subs:";


foreach ($bench as $ben){
echo $ben[0] . " (" . $ben[1] . ", " . $ben[2] . " points) ";
}

echo "</sub>";
echo "</p>";

# return ($eleven);

} //END FUNCTION

//TESTING

?>