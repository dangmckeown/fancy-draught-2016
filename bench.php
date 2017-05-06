<?php

function bench($manager){

$squad = assign_scores($manager);
$eleven = array();

	




//ATTEMPT TO UNSET SELECTED PLAYERS
foreach($eleven["Goalkeepers"] as $gk){
//remove selected player
$key = array_search($gk, $squad['Goalkeepers']);
unset($squad['Goalkeepers'][$key]);
}	
	
foreach($eleven["Defenders"] as $def){
//remove selected player
$key = array_search($def, $squad['Defenders']);
unset($squad['Defenders'][$key]);
}
foreach($eleven["Midfielders"] as $mid){
//remove benched player
$key = array_search($mid, $squad['Midfielders']);
unset($squad['Midfielders'][$key]);
}
foreach($eleven["Forwards"] as $for){
//remove benched player
$key = array_search($for, $squad['Forwards']);
unset($squad['Forwards'][$key]);
}
$bench = $squad;
	

unset($bench["Name"]);
unset($bench["Team"]);




unset($eleven['Goalkeepers'][$key]);
return($bench);
} //end function
	

?>
