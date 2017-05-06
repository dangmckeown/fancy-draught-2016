<?php

function formation($manager){

$eleven = starting_eleven($manager);

$bench = bench($manager);

?>
<center><hr />
<?php
echo "<p><b>" . $manager['Team'] ."</b> <br />" . $manager['Name'] . "</p>";



echo "<p>";

foreach($eleven['Goalkeepers'] as $el){
echo "<div class='Goalkeepers'>" .  $el[0] . " (" . $el[2] . ") </div>";
}
echo "</br>";

foreach($eleven['Defenders'] as $el){
echo "<div class='Defenders'>" . $el[0] . " (" . $el[2] . ") </div>";
}
echo "</br>";


foreach($eleven['Midfielders'] as $el){
echo "<div class='Midfielders'>" . $el[0] . " (" . $el[2] . ") </div>";
}
echo "</br>";


foreach($eleven['Forwards'] as $el){
echo "<div class='Forwards'>" . $el[0] . " (" . $el[2] . ") </div>";
}


echo "</p>";

echo "<p>Bench: ";


foreach ($bench as $key => $ben){
  if (count($ben)){
echo $key . ": ";
foreach ($ben as $b){
echo $b[0] . " (" . $b[2] . ") ";
}
  }
}




echo "</p></center>";
  
#  print_r($bench);

} //END FUNCTION

?>
