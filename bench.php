<?php

function bench($manager){

$score = 0; 

$squad = assign_scores($manager);

$eleven = array();

$reserves = array();

$bench = array();

$def = $squad['Defenders'];
$mid = $squad['Midfielders'];
$for = $squad['Forwards'];


$highscore = 0;
$pickone = 0;
$nextb = 0;
$picktwo = 0;
$third = 0;
$pickthree = 0;

foreach ($def as $d){
if ($d[2] >= $highscore){
$third = $nextb;
$pickthree = $picktwo;
$nextb = $highscore;
$picktwo = $pickone;
$highscore = $d[2];
$pickone = $d;
}
elseif ($d[2] >= $nextb){
$third = $nextb;
$pickthree = $picktwo;
$nextb = $d[2];
$picktwo = $d;
}
elseif ($d[2] >= $third){
$third = $d[2];
$pickthree = $d;
}	//end if

$eleven['Defenders'] = array($pickone,$picktwo,$pickthree);

} //end foreach


//=== Do Midfield

$highscore = 0;
$pickone = 0;
$nextb = 0;
$picktwo = 0;
$third = 0;
$pickthree = 0;

foreach ($mid as $d){
if ($d[2] >= $highscore){
$third = $nextb;
$pickthree = $picktwo;
$nextb = $highscore;
$picktwo = $pickone;
$highscore = $d[2];
$pickone = $d;
}
elseif ($d[2] >= $nextb){
$third = $nextb;
$pickthree = $picktwo;
$nextb = $d[2];
$picktwo = $d;
}
elseif ($d[2] >= $third){
$third = $d[2];
$pickthree = $d;
}	//end if

$eleven['Midfielders'] = array($pickone,$picktwo,$pickthree);

} //end foreach



//=== Do Forwards

$highscore = 0;
$pickone = 0;
$nextb = 0;
$picktwo = 0;
$third = 0;
$pickthree = 0;

foreach ($for as $d){
if ($d[2] >= $highscore){
$third = $nextb;
$pickthree = $picktwo;
$nextb = $highscore;
$picktwo = $pickone;
$highscore = $d[2];
$pickone = $d;
}
elseif ($d[2] >= $nextb){
$third = $nextb;
$pickthree = $picktwo;
$nextb = $d[2];
$picktwo = $d;	
}	//end if

$eleven['Forwards'] = array($pickone,$picktwo);

} //end foreach



//ATTEMPT TO UNSET SELECTED PLAYERS

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

unset($bench["Goalkeepers"]);

unset($eleven['Goalkeepers'][$key]);

unset($bench["Name"]);

unset($bench["Team"]);

//so far, we have a 3-3-2 formation. Now we need to select our two best outfield reserves to add to the mix

//prepare bench array

# var_dump ($bench);

$reserves = array();

for ($i = 1; $i <= 2; $i++){

$score = 0;

$pos = NULL;

$j = NULL;

foreach ($bench as $key => $ben){

	foreach ($ben as $k => $b){
	if ($b[2] >= $score){
		$score = $b[2];
		$player = $b;
		$pos = $key;
		$j = $k;
		} //end if
	} //end foreach

} //endforeach

$reserves[$pos] = $player;
unset($bench[$pos][$j]);
} //end for $i

// And it's there! Now add reserves to pitch

foreach ($reserves as $key => $res){
$eleven[$key][] = $res;
}

// Back of the net! Now split your keepers.

$bench['Goalkeepers'][] = get_min($squad['Goalkeepers']);

$eleven['Goalkeepers'] = $squad['Goalkeepers'];

$key = array_search($bench['Goalkeepers'], $eleven['Goalkeepers']);

unset($eleven['Goalkeepers'][$key]);

foreach($bench as $key => $ben){
if (count($ben) == 0){
unset($bench[$key]);
}
}

return $bench;
} //end function

?>
