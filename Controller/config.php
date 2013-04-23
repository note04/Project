<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
/*$db_host = "localhost";
$db_username = "palisorg_admin";
$db_pass = "jam12345";
$db_name = "palisorg_QTN";*/

$db_host = "localhost";
$db_username = "root";
$db_pass = "password";
$db_name = "questionnaire_db";

$link = mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name",$link) or die ("no database");
mysql_set_charset('utf8',$link);
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8 ");
//if($link){ echo "success";}


?>
