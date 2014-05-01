<html>
<body>
<?php
 class login 
   {
		 function checklogin($u, $p)
		 {
			
			$u=$_POST[uname];
			$p=$_POST[upass];
		    $link=mysql_connect("localhost","root","");
				if(!$link)
			 		echo mysql_error();
				else 
			 		//echo Connection;
					
			mysql_select_db("ajit");
			$qry="select * from user where username='$u' and password='$p'";
			$res=mysql_query($qry);
			$num_rows = mysql_num_rows($res);
			if($num_rows==0)
			     { 
					echo("<script type='text/javascript'>
					      alert('Invalid Login')	
					      window.location='login.html';
						</script>");
				}
				
			$row = mysql_fetch_array($res) or die(mysql_error());
			 	session_start();
				$_SESSION['uname'] = $row['username'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['isset'] = $row['isset'];
			
			if($row['isset']==1)
				{
					header('Location: admin1.php');
				  /* echo("<script type='text/javascript'>
					      window.location='admin.php';
						</script>");*/
				}
		  	else
		  		{  
		  			header('Location: user.php');
		  			/*echo("<script type='text/javascript'>
					    window.location='user.php';
						</script>");*/
		  		}
		  	}
    }
  ?>
  
 </body>
</html>