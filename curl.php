<?php

// Here's where we'll be putting the players
$players=array();


    // Defining the basic cURL function

    function curl($url) {
        $ch = curl_init();  // Initialising cURL
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);	// Target URL has https
        curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
        $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
        curl_close($ch);    // Closing cURL
        return $data;   // Returning the data from the function
    }

    function scrape_between($data, $start, $end){
        $data = stristr($data, $start); // Stripping all data from before $start
        $data = substr($data, strlen($start));  // Stripping $start
        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
        $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
        return $data;   // Returning the scraped data from the function
    }

$source = "https://fantasy.premierleague.com/player-list/";

//get goalies

$raw_data = curl($source);

$delimiters = array("Goalkeepers","Defenders","Midfielders","Forwards","</html>");

for($i = 0; $i < 4; $i++){

$start = $delimiters[$i];
$finish = $delimiters[$i + 1];


$athletes = scrape_between($raw_data,$start,$finish);

$athletes_one = scrape_between($athletes,"<th>Cost</th>","</table>");

$athlete_array = explode("<tr>", $athletes_one);

$no_blanks=array();

foreach ($athlete_array as $goal){
$no_tags= strip_tags($goal);
if (! preg_match("/^\s*$/", $no_tags)){
$no_blanks[] = $goal;
}
}

$athletes_one = $no_blanks;


$athletes_two = scrape_between($athletes,"</table>","</table>");

$athlete_array = explode("<tr>", $athletes_two);

$no_blanks=array();

foreach ($athlete_array as $goal){
$no_tags= strip_tags($goal);
if (! preg_match("/^\s*$/", $no_tags)){
$no_blanks[] = $goal;
}
}

unset($no_blanks[0]);
$athletes_two = $no_blanks;

$athletes = array_merge($athletes_one, $athletes_two);

foreach($athletes as $athlete){



scrape_between($athlete, " ","</tr>");

$individual = explode("<td>", $athlete);

$athlete = $individual;
$athlete[0] = rtrim($delimiters[$i],"s");
$reg_endspace = "/\s+$/";
$athlete[1] = preg_replace($reg_endspace, "", $athlete[1]);
$athlete[2] = preg_replace($reg_endspace, "", $athlete[2]);
$athlete[3] = preg_replace($reg_endspace, "", $athlete[3]);
# unset($athlete[4]);
$players[] = $athlete;
#var_dump($athlete);
}

}//end delimiters loop


?>