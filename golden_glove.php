<?php

function golden_glove(){
//returns array of goalies (score, keeper, manager)

$goalies = rank_goalkeepers();
# var_dump($goalies);

echo "<h4>Joe Hart \"Get that ball, move that F-ing ball\" Memorial Golden Glove Standings</h4><ol>";

for ($i = 0; $i <= 2; $i++){
echo "<li>" . $goalies[$i][1] . " " . $goalies[$i][0] . "</li>";
}

echo "</ol>";


} //end function

?>
