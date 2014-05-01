<html>
<head>
<title>Add-User1</title>
</head>
<body>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td> </td>
  </tr>
  <tr>
    <td>  
    <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td> </td>
        </tr>
        <tr>
          <td>
          <?php
          $mode=$_GET["mode"];
          if($mode=="add") 
		  {
           ?>
          <form name="form1" method="post" action="formsubmit.php?mode=add">
            <table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><strong>Add New User </strong></td>
                <td> </td>
              </tr>
              <tr>
                <td>User Name </td>
                <td><input name="username" type="text" id="username"></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input name="password" type="text" id="password"></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Save Data"></td>
                <td> </td>
              </tr>
            </table>
          </form>
          <?php       
          } 
		  else  {
             include("conn.php");
              $id=$_GET["id"];
			  $sql="select * from $user where id='$id'";
           
            $result=mysql_query($sql,$connection) or die(mysql_error());
            while($row=mysql_fetch_array($result)) {
                $id=$row['id'];
                $username=$row['username'];
                $password=$row['password'];
				
            }
        ?>
        <form name="form1" method="post" action="formsubmit.php?mode=update">
            <table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><strong>Update User </strong></td>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>">
                   </td>
              </tr>
              <tr>
                <td>User  Name </td>
                <td><input name="username" type="text" id="username" value="<?php echo $username ;?>"></td>
              </tr>
              <tr>
                <td>Password </td>
                <td><input name="password" type="text" id="password" value="<?php echo $password; ?>"></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Update Data"></td>
                <td> </td>
              </tr>
            </table>
          </form>      
        <?php   
           }
          ?>
          </td>
        </tr>
        <tr>
          <td> </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>


