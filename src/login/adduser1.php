<html>
<head>
	<title>Add-User</title>
	<script type="text/javascript" src="script.js"> </script>
	<link rel="stylesheet" href="dialog.css" type="text/css" />
	<script language="JavaScript" src="prototype.js"></script>
	<script language="JavaScript" src="dialog.js"></script>
</head>
<body bgcolor="CCCCCC">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="CCCCCC">
  <tr><br><br>
    <td><center><b>Add New User Form</b></center></td>
    <a style="margin-left:100px"href="http://localhost/Ajit/login/admin1.php"><strong>Back</strong></a>
    <td><hr size="2" noshade></td>
  </tr>
  <tr>
    <td><br>
      <form action="" method="post" name="" id="">
        <table width="600" border="1" align="center" cellpadding="2" cellspacing="2">
          <tr>
            <td><input name="topcheckbox" type="checkbox" class="check" id="topcheckbox" onClick="selectall();" value="ON">
	Select All </td>
            <td colspan="3" align="center"><a href="#" id="dialog_11"><strong>Add New User</strong></a></td>
          </tr>
          <tr>
            <td><strong><a href="javascript:goDel()">Delete</a></strong></td>
            <td><strong>Username </strong></td>
            <td colspan="2"><strong>Password </strong></td>
          <!--  <td><strong><a href="#" id="dialog_11">Edit</a></strong></td>-->
          </tr>
          <?php
          include("conn.php");
          
		  $sql="select id,username,password from $user order by id";
          $result=mysql_query($sql,$connection) or die(mysql_error());
          while($row=mysql_fetch_array($result)) {
          	
		 // echo $row['id'];
		  //echo $row['username'];
          ?>
          <tr>
            <td><input name="<?php echo $row['id']; ?>" type="checkbox" class="check"></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><a href="<?php echo "form.php?id=".$row['id']."&mode=update";?>"id="dialog_10">Edit</a></td>
          </tr>
          <?php } ?>
         <!-- <tr>
            <td><strong><a href="javascript:goDel()">Delete</a></strong></td>
            <td><strong>Username </strong></td>
            <td><strong>Password </strong></td>
            <td><strong>Update</strong></td>
          </tr>-->
        </table>
    </form></td>
  </tr>
</table>
<script type="text/javascript">
new Dialog({
        handle:'#dialog_11',
        title:'Add-User',
        ajax:{
                url:'form.php?mode=add',
             }
});
new Dialog({
        handle:'#dialog_10',
        title:'Update-User',
        ajax:{
                url:'<?php echo "form.php?id=".$row['id']."&mode=update";?>',
			 }
});
</script>
</body>
</html>
