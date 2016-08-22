<?php

function mingers(){

$mvps = rank_players();
$count = count($mvps);

echo "<h4>Tyrone Mings \"Could Be One for Next Season\" Memorial Trophy</h4><ol>";

for ($i = 1; $i <= 3; $i++){
echo "<li>" . $mvps[$count - $i][1] . " " . $mvps[$count - $i][0] . "</li>";
}

echo "</ol>";


} //end function

?>
