<?php

/*
* Functions *******************************************
*
* get_min = from original app, takes lowest scoring players from array
* assign_scores = assigns score to each player in a team
* bench_players = filters out lowest scorers
* starting_eleven = selects highest scoring 11 (inc one goalie)
* league_display = show current league table
* team_display = look at team in depth
*
*/

function get_min($array){
  $min=array('Name' => "Default value",2 => 20000);
  foreach ($array as $arr){

    if ($arr[2] < $min[2]){
      $min = $arr;
    }//end if

  } //end foreach
  return $min;
} //end get_min()

//=====================================================================================

?>
