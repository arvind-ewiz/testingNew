<?php
 $conn = mysql_connect("localhost","root","");
   $res = mysql_query("CREATE DATABASE upload", $conn);
   mysql_select_db("upload", $conn);
   ?>
  
   