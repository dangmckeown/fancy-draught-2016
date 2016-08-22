<?php

function get_score($manager){
$score = 0;
$eleven = starting_eleven($manager);
foreach ($eleven as $elf){
foreach($elf as $el){

$score += $el[2];
}
}

return ($score);

} //END FUNCTION

?>
