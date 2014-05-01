<?php
//include("connn.php");
         $db_name="tutorials";
          
         $connection=mysql_connect("localhost","root","") or die("I Couldn't connect");
         
         $db=mysql_select_db($db_name,$connection) or die("I Couldn't select your database");
        
        // $tutorial="tutorials_tbl";

	$tutorial="tutorials_tbl"; 
   $tutorial_id=$_GET["tutorial_id"];         
   $tutorial_title=$_GET["tutorial_title"];
   $tutorial_author=$_GET["tutorial_author"];
          
           
          echo $sql="update $tutorial set tutorial_title='$tutorial_title',tutorial_author='$tutorial_author' where tutorial_id=$tutorial_id";
          $result=mysql_query($sql,$connection) or die(mysql_error());  
          //mysql_query($sql);
            
       header('location:tutorial.php');
         
   /*     // header('Location: http://www.example.com/');
        $username=$_POST["username"];
            $password=$_POST["password"];
            $id=$_POST["id"];
   echo $id;
             echo $sql="update $user set username='$username',password='$password' where id='$id'";
            $result=mysql_query($sql,$connection) or die(mysql_error());
            header("location: index.php");
          }
 */
?>