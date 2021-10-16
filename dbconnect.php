<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
if(!mysql_connect("localhost","s101062139","dwsx0807"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("s101062139"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>