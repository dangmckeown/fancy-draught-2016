<!doctype=html>
<html>
<head><title>Fancy draught</title></head>

<body>

<?php

include_once('players.php');
// loads up $players array

include_once('teams.php');
// loads up managers & selections

include_once('functions.php');
// loads up functions

// eventually just want one page_creator.php include

starting_eleven($joe);

starting_eleven($dan);

?>
</body>
</html>