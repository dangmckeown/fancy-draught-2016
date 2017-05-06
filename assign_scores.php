<?php



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
	$pat = "/^\d/";
$gk[2] = "0";
	foreach($players as $player){
	if ($player[0] == $p && $player[1] == $gk[0] && $player[2] == $gk[1] ){
		$gk[2] = $player[3];
	} //end if
		else if($player[0] == $p && $player[1] == $gk[0] && preg_match($pat,$player[1])){
		$gk[2] = $player[1];
		}
	} //end foreach $players

$squad[$pt][] = $gk;

} //end foreach $gk

} // end foreach $pt


return $squad;

}//end function assign_scores

//===========================================================================

?>
