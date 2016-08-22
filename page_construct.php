<?php

# include_once('curl.php');

include_once('players.php');
// loads up $players array

include_once('teams.php');
// loads up managers & selections

include_once('functions.php');
// loads up functions



league_table($teams);

foreach($teams as $man){
formation($man);
}



echo "<hr /><center><h3>Player awards</h3></center>";

mvps();

golden_glove();

mingers();

?>

