<?php

/*
* Functions *******************************************
*
* get_min = from original app, takes lowest scoring players from array
* assign_scores = assigns score to each player in a team
* get_score = return total score for manager
* bench_players = filters out lowest scorers
* starting_eleven = selects highest scoring 11 (inc one goalie)
* league_table = show current league table
* formation = look at team in depth
* rank_goalies = order goalkeepers by score
* golden_glove = output league table of goalies
* rank_players = rank all players
* mvps = output best players
* mingers = output worst players
* price_up = retrieve player prices
* fa_player = output table of players ranked by price
*/


include_once('get_min.php');
include_once('assign_scores.php');
include_once('get_score.php');
include_once('bench.php');
include_once('starting_eleven.php');
include_once('league_table.php');
include_once('formation.php');
include_once('rank_goalkeepers.php');
include_once('golden_glove.php');
include_once('rank_players.php');
include_once('mingers.php');
include_once('mvps.php');


?>
