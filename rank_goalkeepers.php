<?php

include_once('players.php');
// loads up $players array

include_once('teams.php');
// loads up managers & selections

include_once('functions.php');
// loads up functions

function rank_goalkeepers(){
//returns array of goalies (score, keeper, manager)
global $teams;

$goalies = array();

foreach ($teams as $man){

$players = assign_scores($man);

foreach ($players['Goalkeepers'] as $gk){
$score = $gk[2];
$player = $gk[0];
$manager = $man['Name'];
$goalies[]=array($score,$player,$manager);

}

}
rsort($goalies);
return($goalies);
} //end function

?>
