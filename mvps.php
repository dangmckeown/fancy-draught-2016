<?php

function mvps(){

$mvps = rank_players();

echo "<h4>David Beckham Ballons d'Or MVP Standings</h4><ol>";

for ($i = 0; $i <= 2; $i++){
echo "<li>" . $mvps[$i][1] . " " . $mvps[$i][0] . "</li>";
}

echo "</ol>";


} //end function

?>
