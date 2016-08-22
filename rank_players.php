<?php

function rank_players(){
//returns array of goalies (score, keeper, manager)
global $teams;

$mvps = array();

foreach ($teams as $man){

$players = assign_scores($man);

foreach ($players['Goalkeepers'] as $gk){
$score = $gk[2];
$player = $gk[0];
$manager = $man['Name'];
$mvps[]=array($score,$player,$manager);
}

foreach ($players['Defenders'] as $df){
$score = $df[2];
$player = $df[0];
$manager = $man['Name'];
$mvps[]=array($score,$player,$manager);
}

foreach ($players['Midfielders'] as $mf){
$score = $mf[2];
$player = $mf[0];
$manager = $man['Name'];
$mvps[]=array($score,$player,$manager);
}

foreach ($players['Forwards'] as $fw){
$score = $fw[2];
$player = $fw[0];
$manager = $man['Name'];
$mvps[]=array($score,$player,$manager);
}


}
rsort($mvps);
return($mvps);
} //end function

?>
