<?php
          
		  include("conn.php");
          $mode=$_GET["mode"];
          if($mode=="add") 
		  {
            $username=$_POST["username"];
            $password=$_POST["password"];
            $city=$_POST["city"];
            $mobno=$_POST["mobno"];
            $sql="insert into $user(username,password,city,mobno) values('$username','$password','$city','$mobno')";
            $result=mysql_query($sql,$connection) or die(mysql_error());
            header("location: index.php");
           } 
		  elseif($mode=="update") {
            $username=$_POST["username"];
            $password=$_POST["password"];
            $city=$_POST["city"];
            $mobno=$_POST["mobno"];
            $id=$_POST["id"];
			echo $id;
            echo $sql="update $user set username='$username',password='$password',city='$city',mobno='$mobno' where id='$id'";
            $result=mysql_query($sql,$connection) or die(mysql_error());
            header("location: index.php");
          }
?> 