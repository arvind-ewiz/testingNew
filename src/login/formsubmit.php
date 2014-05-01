<?php
          //echo "ajit";
		  include("conn.php");
          $mode=$_GET["mode"];
          if($mode=="add") 
		  {
            $username=$_POST["username"];
            $password=$_POST["password"];
            $sql="insert into $user(username,password) values('$username','$password')";
            $result=mysql_query($sql,$connection) or die(mysql_error());
            header("location: adduser.php");
           } 
		  elseif($mode=="update") {
            $username=$_POST["username"];
            $password=$_POST["password"];
            $id=$_POST["id"];
			echo $id;
            echo $sql="update $user set username='$username',password='$password' where id='$id'";
            $result=mysql_query($sql,$connection) or die(mysql_error());
            header("location: adduser.php");
          }
?> 