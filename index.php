<!doctype=html>
<html>
<head><title>Fancy draught</title>
<meta name="viewport" content="width=device-width">
<style>

#header {
	width: 100%;background:url('');
}

@media screen and (max-width: 499px)
{
#header_image	{
	display: none;
}
div {display: block;width:100%;}
.goalkeepers {background-color: #eeffee;}
.defenders {background-color: #eeeeff;}
.midfielders {background-color: #eeeeee;}
.forwards {background-color: #ffeeee;}
}

@media screen and (min-width:500px)
{
div {display:inline; width: 125px;}
}

</style>


</head>

<body>
<center>
<div id="header"><table><tr><td style="padding-right:50px;" id="header_image">
<img style="width:200px;float:left" src="https://upload.wikimedia.org/wikipedia/commons/5/57/Mobfooty.jpg" />
</td><td>
<h1>Fantasy Draft League 2016-17</h1>
<h2>You pays your money, you takes your choice. <br />Except in this case, you don't pays your money.</h2>
</td></tr>
</table>

</div>

</center>

<?php

include_once('page_construct.php');

?>
</body>
</html>
