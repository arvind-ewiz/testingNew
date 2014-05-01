<?php
        $db_name="tutorials";
        $connection=mysql_connect("localhost","root","") or die("I Couldn't connect");
        $db=mysql_select_db($db_name,$connection) or die("I Couldn't select your database");
        $tutorial="tutorials_tbl"; 
?>