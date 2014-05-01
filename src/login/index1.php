<html>
<head>
	<title>Add-User</title>
	<script type="text/javascript" src="script.js"> </script>
	<link rel="stylesheet" href="dialog.css" type="text/css" />
	<script language="JavaScript" src="prototype.js"></script>
	<script language="JavaScript" src="dialog.js"></script>
</head>
<body bgcolor="#ccccc0">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ccccc0">
  <tr><br><br>
    <td><center><b><u>Add New User</u></b></center></td><a style="margin-left:1000px"href="http://localhost/resize1/admin.php">Home</a>
    <td><hr size="2" noshade></td>
  </tr>
  <tr>
    <td><br>
      <form action="" method="post" name="" id="">
        <table width="600" border="1" align="center" cellpadding="2" cellspacing="2">
          <tr>
            <td><input name="topcheckbox" type="checkbox" class="check" id="topcheckbox" onClick="selectall();" value="ON">
	Select All    </td>
            <td colspan="3" align="center"><a href="#" id="dialog_11">Add New User </a></td>
          </tr>
          <tr>
            <td><strong><a href="javascript:goDel()">Delete</a></strong></td>
            <td><strong>Username </strong></td>
            <td><strong>Password </strong></td>
            <td><strong>Update</strong></td>
          </tr>
          <?php
          include("conn.php");
		   $sql="select id,username,password from $user order by id";
          //$sql="select sn,branchname,shortname from $branch order by sn";
          $result=mysql_query($sql,$link) or die(mysql_error());
          while($row=mysql_fetch_array($result)) {
		  //echo $row['id'];
		  //echo $row['username'];
          ?>
          <tr>
            <td><input name="<?php echo $row['id']; ?>" type="checkbox" class="check"></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><a href="<?php echo "form.php?id=".$row['id']."&mode=update";?>"id="dialog_10">Update</a></td>
          </tr>
          <?php } ?>
          <tr>
            <td><strong><a href="javascript:goDel()">Delete</a></strong></td>
            <td><strong>Username </strong></td>
            <td><strong>Password </strong></td>
            <td><strong>Update</strong></td>
          </tr>
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


<script>
new Dialog({
handle:'#hitBtn',
title:'Add New Account ',
content:'<table width="775" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"> <tr><td></td></tr><tr><td><table width="700" border="0" align="center" cellpadding="2" cellspacing="2"><tr><td></td></tr><tr><td><?php $mode=$_GET["mode"];if($mode=="add")//{?><form name="form1" method="post" action="formsubmit.php?mode=add"><table width="500" border="1" align="center" cellpadding="2" cellspacing="2"><tr><td><strong><font color="blue">User New Account </font></strong></td><td><input type="hidden" name="id" value="<?php echo $id; ?>"></td> <td> </td></tr><tr><td><h5>User Name </td><td><input name="username" type="text" id="username"></td></tr></h5><tr><td><h5>Password</td></h5><td><input name="password" type="text" id="password" width="100"/></td></tr><tr><td><h5>EmailId</td></h5><td><input name="email" type="text" id="email">&nbsp;<font color="red">eg:example@gmail.com</font></td></tr><tr><td><h5>select Gender:</td><td><input type="radio" name="gender" value="male" /> Male<input type="radio" name="gender" value="female" /> Female <font color="Red">*</font></td></tr></h5><tr><td><h5>select State:</td><td> <select name="states" value=""><br /><option value="Maharashtra"></option><br /><option value="Maharashtra"> Maharashtra</option><br /><option value="Gujarat">Gujarat</option> <br /><option Value="Karnataka">Karnataka</option></select><font color="Red">*</font><br /></td></tr></p></h5><p><tr><td><h5><lable for= user type>User type </lable></td><td><input type="radio" name="user" value="0" checked /> User<input type="radio" name="user" value="1" / > Admin </p><p></td></h5><br /> <tr><td width=""><span class="style3"><h5>Select Question </span></td><td><select name="question" id="que"><option>what is your pet name?</option><option>who is your fevorite actor?</option><option>who is your fevorite singer?</option><option>what is your initials?</option></select></h5> </td></tr><tr><td><h5><span class="style3">Answer</span></td><td><input name="answer" type="text" id="answer"></td></h5></tr><tr><td><h5>Address: </td><td><textarea name="address" value=""></textarea><font color="Red">*</font><br/></td></tr></h5><tr><td><h5> For photo upload:</td><td> <input type="file" name="photo" accept="image/*"> </p></td></tr><tr><td><input type="submit" name="Submit" value="Create Account"></td><td> </td></tr></table></form>',
className:'myFirstDialog',
width:700,
height:600
});

</script>

